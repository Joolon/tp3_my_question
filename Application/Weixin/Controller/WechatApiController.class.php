<?php 
namespace Weixin\Controller;

use Common\Controller\BaseController;
use Weixin\Event\MsgMapNumber;
use Weixin\Event\MsgMapTpl;
use Weixin\Event\NewsList;
use Weixin\Event\TulingRobot;
// use Library\HttpTool;


/**
 * 运行在公众号连接的回调模式下
 * 对接微信服务器，响应来自其推送的普通消息或操作事件
 */
class WechatApiController extends BaseController
{
    public $fromUsername    = null;
    public $toUsername      = null;
    public $msgType         = null;
    public $postObj         = null;
    public $nowTime         = null;
    
	protected function _initialize()
	{
	    
	}


	/**
	 * 微信 API 唯一入口
	 * 监听微信公众平台推送的普通消息或操作事件
	 */
	public function index()
	{
	    requestLog();
	    // 原样返回 echostr 字段的信息，表示微信验证通过
	    if(I('get.echostr')){
	        $this->valid();
	    }else{
	        $this->responseMsg();	        
	    }
	    exit;
	}
	
	
	/**
	 * 验证请求是否是来自微信(验证通过原样返回 echostr 字段的内容)
	 */
	public function valid(){
	    $echoStr = I('get.echostr');
        saveLog($echoStr);

        echo $this->checkSignature()?$echoStr:'error';
        exit;
	}
	
	
	/**
	 * 文本回复接口
	 */
	public function responseMsg(){
	    $postStr = $GLOBALS['HTTP_RAW_POST_DATA'];// 不能使用 POST 接收，POST只能接收标准的 POST数据，XML数据不能接收
	    
	    if(!empty($postStr)){
	        saveLog($postStr);
	        libxml_disable_entity_loader(true);
	        
	        $this->postObj        = simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
	        $this->fromUsername   = $this->postObj->FromUserName;// 消息发送者
	        $this->toUsername     = $this->postObj->ToUserName;// 消息接收者
	        $this->msgType        = $this->postObj->MsgType;// 接受用户消息类型
	        $this->nowTime        = time();
	        
	        switch($this->msgType){
	            case 'text':	               
	                $resultStr = $this->transmitText();
	                break;
	            case 'image':
	                $resultStr = $this->transmitImage();
	                break;
	            case 'news':
	                $resultStr = $this->transmitNews();
	                break;
	            case 'voice':
	                $resultStr = $this->transmitVoice();
	                break;
	            case 'location':
	                $resultStr = $this->transmitLocation();
	                break;
	            case 'video':
	                $resultStr = $this->transmitVideo();
	                break;
	            case 'shortvideo':
	                $resultStr = $this->transmitShortvideo();
	                break;
	            case 'link':
	                $resultStr = $this->transmitLink();
	                break;
	            case 'event':
	                $resultStr = $this->transmitEvent();
	                break;
	                
	            default :
	                $resultStr = $this->convertToText('您已穿越到唐朝啦');
	                
	        }
	        saveLog($resultStr);
	        
	        echo $resultStr;
	    }else{
	        echo '';
	    }
	    exit;
	}
	
	public function transmitText(){
	    $keyWord        = trim($this->postObj->Content);
	    if(!empty($keyWord)){
	        $resultStr = '';
	        
	        $returnContent  = MsgMapNumber::mapMsg($keyWord);// 根据关键字的值设置 返回消息类型与内容
	        $msgType        = $returnContent['msgType'];// 返回的消息类型
	        $content        = $returnContent['content'];// 返回的消息内容
	        $xmlTpl         = MsgMapTpl::mapTpl($msgType);// 根据消息类型获取 类型对应的模板
	        
	        if($msgType == 'text' AND $content){// 文本消息内容
	            $resultStr = sprintf($xmlTpl,$this->fromUsername,$this->toUsername,$this->nowTime,$msgType,$content);
	        }else if($msgType == 'music'){// 音乐消息内容
	            if(isset($content['title'])){// 内容是否为空
	                $resultStr = sprintf($xmlTpl,$this->fromUsername,$this->toUsername,$this->nowTime,$msgType,$content['title'],$content['desc'],$content['url'],$content['hqurl']);
	            }
	        }elseif($msgType == 'news'){// 图文消息内容
	            $resultStr = $this->convertToNews();
	        }
	        
	        if(empty($resultStr)){// 未响应用户请求
	            $return_text = TulingRobot::queryTuLingText($keyWord);// 调用 图灵机器人返回消息
	            if(!$return_text){
	                $return_text = "暂未实现该功能，敬请等待...";
	            }
	            
	            $msgType    = 'text';
	            $resultStr  = sprintf($xmlTpl,$this->fromUsername,$this->toUsername,$this->nowTime,$msgType,$return_text);
	        }
	        
	        return $resultStr;
	    }else{
	        return 'Input something...';
	    }	    
	    
	}
	
	public function transmitImage(){
	    $msgType    = 'text';
	    $xmlTpl     = MsgMapTpl::mapTpl($msgType);
	    $content    = "Welcome to wechat world!\n您发送的是图片消息，未能处理您的请求\n";
	    
	    return $this->convertToText($content);
	}
	
	/**
	 * 发送一个文本消息
	 * @param unknown $content
	 * @param string $msgType
	 * @return string
	 */
	public function convertToText($content,$msgType = 'text'){
	    $xmlTpl        = MsgMapTpl::mapTpl($msgType);// 根据消息类型获取 类型对应的模板
	    $resultStr     = sprintf($xmlTpl,$this->fromUsername,$this->toUsername,$this->nowTime,$msgType,$content);
	    
	    return $resultStr;
	}
	
	/**
	 * 发送一个 图文消息
	 * 图文消息个数；当用户发送文本、图片、视频、图文、地理位置这五种消息时，开发者只能回复1条图文消息；其余场景最多可回复8条图文消息
	 * @link https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421140543
	 * @param number $count
	 * @param string $msgType
	 * @return string
	 */
	public function convertToNews($count = 3,$msgType = 'news'){
	    $itemsLit           = NewsList::getNewsList($count);// 图文消息列表
	    $newsXmlTpl         = MsgMapTpl::mapTpl('news');// 图文消息模板
	    $newsItemsXmlTpl    = MsgMapTpl::mapTpl('news_items');// 图文消息模板中的 Items模板
	    
	    // 拼装 Items的数据
	    $count              = count($itemsLit);
	    $newsItemsXml       = '';
	    foreach($itemsLit as $value_item){
	        $newsItemsXml   .= sprintf($newsItemsXmlTpl,$value_item['title'],$value_item['desc'],$value_item['picUrl'],$value_item['url']);
	    }
	    
	    // 拼接消息内容
	    $newsXml = sprintf($newsXmlTpl,$this->fromUsername,$this->toUsername,$this->nowTime,$msgType,$count,$newsItemsXml);
	    
	    return $newsXml;	    
	}
	
	/**
	 * 响应 微信事件类型 消息
	 */
	public function transmitEvent(){
	    $event     = $this->postObj->Event;
	    $eventKey  = $this->postObj->EventKey;
	    
	    if($event == 'CLICK' AND $eventKey == 'C_NEWS'){// 最新消息
	        return $this->convertToNews(10);
	        
	    }elseif($event == 'CLICK' AND $eventKey == 'C_QUEST'){// 查看问卷
	        $content = "【Thank You】\r\n让您满意是我们最高荣耀！感谢您的来信。";
	        return $this->convertToText($content);
	        
	    }elseif($event == 'CLICK' AND $eventKey == 'C_GOOD'){
	        $content = "【Thank You】\r\n让您满意是我们最高荣耀！感谢您的来信。";
	        return $this->convertToText($content);
	        
	    }elseif($event == 'scancode_push' AND $eventKey == 'C_SCAN'){// 扫码获取内容，但是不会推送到服务器，URL则会自动打开
	        $content = $this->postObj->ScanResult;
	        return $this->convertToText($content);
	        
	    }elseif($event == 'scancode_waitmsg' AND $eventKey == 'C_SCAN_2'){// 扫码获取内容并且推送到服务器，等待结果
	        $content = "【消息内容】\r\n".($this->postObj->ScanCodeInfo->ScanResult);
	        return $this->convertToText($content);
	        
	    }elseif($event == 'location_select' AND $eventKey == 'C_LOCAL'){// 地理位置选择 事件推送
	        // 先发起一个 地理位置选择时间，再发送地理位置消息  （transmitLocation() 方法捕捉地理消息）
	        $location_X    = $this->postObj->SendLocationInfo->Location_X;
	        $location_Y    = $this->postObj->SendLocationInfo->Location_Y;
	        $scale         = $this->postObj->SendLocationInfo->Scale;
	        $label         = $this->postObj->SendLocationInfo->Label;
	        $createTime    = date('Y-m-d H:i:s');
	        
	        $content = "【您的位置】\r\n ".
	   	        "经度：{$location_X}\r\n".
	   	        "纬度：{$location_Y}\r\n".
	   	        "位置：{$label}\r\n".
	   	        "精度：{$scale}\r\n".
	            "时间：{$createTime}";
	        return $this->convertToText($content);
	        
	    }elseif($event == 'subscribe' OR $event == 'unsubscribe'){// 订阅、取消订阅时处理事件
	        if($event == 'subscribe'){// 关注时推送一个问候语
	            return $this->convertToText('等你等了那么久，亲,欢饮您');
	        }else{
	            
	            return '';	            
	        }	        
	    }else{
	        return $this->convertToText('亲爱的，您已穿越到明朝了哦');
	    }
	    
	    
	}
	
	public function transmitVoice(){
	    $recognition   = $this->postObj->Recognition;
	    $mediaID       = $this->postObj->MediaID;
	    $format        = $this->postObj->Format;
	    $content       = "【您的消息】\r\n内容：{$recognition}\r\n资源ID：{$mediaID}\r\n格式：{$format}";
	    return $this->convertToText($content);
	}
	
	public function transmitVideo(){
	    $mediaId       = $this->postObj->MediaId;
	    $content       = "【您的消息】\r\n内容：视频\r\n资源ID：{$mediaId}";
	    return $this->convertToText($content);
	}
	
	
	public function transmitShortVideo(){
	    $mediaId       = $this->postObj->MediaId;
	    $content       = "【您的消息】\r\n内容：小视频\r\n资源ID：{$mediaId}";
	    return $this->convertToText($content);
	}
	
	
	public function transmitLink(){
	    $title         = $this->postObj->Title;
	    $description   = $this->postObj->Description;
	    $url           = $this->postObj->Url;
	    $msgId         = $this->postObj->MsgId;
	    $content       = "【您的消息】\r\n标题：{$title}\r\n描述：{$description}\r\n链接：{$url}\r\n资源ID：{$msgId}";
	    return $this->convertToText($content);
	}
	
	/**
	 * 地理位置消息推送
	 * @return string
	 */
	public function transmitLocation(){
	    $location_X    = $this->postObj->Location_X;
	    $location_Y    = $this->postObj->Location_Y;
	    $scale         = $this->postObj->Scale;
	    $label         = $this->postObj->Label;
	    $createTime    = date('Y-m-d H:i:s');
	    
	    $content = "【您的位置】\r\n ".
	   	    "经度：{$location_X}\r\n".
	   	    "纬度：{$location_Y}\r\n".
	   	    "位置：{$label}\r\n".
	   	    "精度：{$scale}\r\n".
	   	    "时间：{$createTime}";
	    return $this->convertToText($content);
	    
	}
	
	
	
	/**
	 * 验证请求 签名是否正确
	 * @throws Exception
	 * @return boolean
	 */
	private function checkSignature(){
        $this->loadSettings(); //加载系统配置信息到C('settings')中

        $token = C('settings.weixin_Token');
	    if( !$token ){
	        throw new \Exception('TOKEN is not defined!');
	    }
	    
	    $signature  = $_GET['signature'];
	    $timestamp  = $_GET['timestamp'];
	    $nonce      = $_GET['nonce'];
	    
	    $tmpArr = array($token,$timestamp,$nonce);
	    sort($tmpArr,SORT_STRING);
	    
	    $tmpStr     = implode($tmpArr);
	    $tmpStr     = sha1($tmpStr);
	    
	    if($tmpStr == $signature){
	        return true;
	    }else{
	        return false;
	    }
	}
	


}
?>