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
class WechatCallbackApiController extends BaseController
{
	protected function _initialize()
	{
	    
	}


	/**
	 * 监听微信公众平台推送的普通消息或操作事件
	 */
	public function index()
	{
	    requestLog();
	    // 原样返回 echostr 字段的信息，表示微信验证通过
	    if(true){
	        $this->valid();
	    }
	    $this->responseMsg();
	    
	    // $phoneNumber = new MsgMapNumber();
	    // $phoneNumber->responsePhoneNumberList();
	}
	
	
	// 验证请求是否是来自微信(验证通过原样返回 echostr 字段的内容)
	public function valid(){
	    $echoStr = $_GET['echostr'];
        saveLog($echoStr);
        echo $echoStr;
        exit;

	    if($this->checkSignature()){
	        echo $echoStr;
	        exit;
	    }
	}
	
	
	/**
	 * 文本回复接口
	 */
	public function responseMsg(){
	    $postStr = $GLOBALS['HTTP_RAW_POST_DATA'];
	    
	    if(!empty($postStr)){
	        saveLog($postStr);
	        
	        libxml_disable_entity_loader(true);
	        
	        $postObj        = simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
	        $fromUsername   = $postObj->FromUserName;// 消息发送者
	        $toUsername     = $postObj->ToUserName;// 消息接收者
	        $msgType        = $postObj->MsgType;// 接受用户消息类型
	        $time           = time();
	        
	        saveLog($msgType);
	        if($msgType == 'text'){
	            $keyWord        = trim($postObj->Content);
	            if(!empty($keyWord)){
	                $resultStr = '';
	                
	                $returnContent  = MsgMapNumber::mapMsg($keyWord);// 根据关键字的值设置 返回消息类型与内容
	                $msgType        = $returnContent['msgType'];// 返回的消息类型
	                $content        = $returnContent['content'];// 返回的消息内容
	                $xmlTpl         = MsgMapTpl::mapTpl($msgType);// 根据消息类型获取 类型对应的模板
	                
	                saveLog($xmlTpl);
	                saveLog($returnContent);
	                if($msgType == 'text' AND $content){// 文本消息内容
	                    $resultStr = sprintf($xmlTpl,$fromUsername,$toUsername,$time,$msgType,$content);
	                }else if($msgType == 'music'){// 音乐消息内容
	                    if(isset($content['title'])){// 内容是否为空
	                        $resultStr = sprintf($xmlTpl,$fromUsername,$toUsername,$time,$msgType,$content['title'],$content['desc'],$content['url'],$content['hqurl']);
	                    }
	                }elseif($msgType == 'news'){// 图文消息内容
	                    $itemsLit           = NewsList::getNewsList(3);// 图文消息列表
	                    $newsXmlTpl         = MsgMapTpl::mapTpl('news');// 图文消息模板
	                    $newsItemsXmlTpl    = MsgMapTpl::mapTpl('news_items');// 图文消息模板中的 Items模板
	                    
	                    
	                    // 拼装 Items的数据
	                    $count              = count($itemsLit);
	                    $newsItemsXml       = '';
	                    foreach($itemsLit as $value_item){
	                        $newsItemsXml   .= sprintf($newsItemsXmlTpl,$value_item['title'],$value_item['desc'],$value_item['picUrl'],$value_item['url']);
	                    }
	                    
	                    // 拼接消息内容
	                    $newsXml = sprintf($newsXmlTpl,$fromUsername,$toUsername,$time,$msgType,$count,$newsItemsXml);
	                    
	                    $resultStr = $newsXml;
	                }
	                
	                if(empty($resultStr)){// 未响应用户请求
	                    $return_text = TulingRobot::queryTuLingText($keyWord);// 调用 图灵机器人返回消息
	                    if(!$return_text){
	                        $return_text = "暂未实现该功能，敬请等待...";
	                    }
	                    
	                    $msgType    = 'text';
	                    $resultStr  = sprintf($xmlTpl,$fromUsername,$toUsername,$time,$msgType,$return_text);
	                }
	                saveLog($resultStr);
	                
	                echo $resultStr;
	            }else{
	                echo 'Input something...';
	            }
	            
	        }elseif($msgType == 'image'){// 用户图片消息
	            $msgType    = 'text';
	            $xmlTpl     = MsgMapTpl::mapTpl($msgType);
	            $contentStr = "Welcome to wechat world!\n您发送的是图片消息，未能处理您的请求\n";
	            $resultStr  = sprintf($xmlTpl,$fromUsername,$toUsername,$time,$msgType,$contentStr);
	            
	            echo $resultStr;
	        }elseif($msgType == 'location'){// 地理位置消息
	            
	            
	            
	            
	        }
	        
	        saveLog(100);
	    }else{
	        echo '';
	    }
	    exit;
	}
	
	
	
	/**
	 * 验证请求 签名是否正确
	 * @throws Exception
	 * @return boolean
	 */
	private function checkSignature(){
	    
	    if(!C('TOKEN')){
	        throw new \Exception('TOKEN is not defined!');
	    }
	    
	    $signature  = $_GET['signature'];
	    $timestamp  = $_GET['timestamp'];
	    $nonce      = $_GET['nonce'];
	    $token      = TOKEN;
	    
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