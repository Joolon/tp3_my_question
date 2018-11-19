<?php
namespace Weixin\Event;

/**
 * 图灵机器人
 * @author Administrator
 *
 */
class TulingRobot{
    
    public static $_apiKey      = 'b24b95f2ce5f403c9796bcb29deb851e';// 用户 API KEY
    public static $_userId      = '340824';// 用户ID
    public static $_tulingUrl   = "http://openapi.tuling123.com/openapi/api/v2";// 图灵API地址
    
    /**
     * 拼装图灵API 需要的数据
     * @param string $text
     * @return string
     */
    public static function getJsonText($text){
        
        $tuling_url = "http://openapi.tuling123.com/openapi/api/v2";
        $json = '{
                	"reqType":0,
                    "perception": {
                        "inputText": {
                            "text": "%s"
                        }
                    },
                    "userInfo": {
                        "apiKey": "%s",
                        "userId": "%s"
                    }
                }';
        $json = sprintf($json,$text,self::$_apiKey,self::$_userId);
        
        return $json;
    }
    
    /**
     * 调用 图灵API接口 获取机器人自动回复消息
     * @param string $text
     * @return string
     */
    public static function queryTuLingText($text){
        $json = self::getJsonText($text);
        
        $data = self::post(self::$_tulingUrl,$json);
        
        $data = json_decode($data,true);
        
        $data = self::analysisData($data);
        
        return $data;
    }
    
    /**
     * 解析 图灵 API返回的数据，多条数据合并展示
     * @param string $data
     * @return string
     */
    public static function analysisData($data){
        
        $text_list = [];
        if(isset($data['results']) AND is_array($data['results'])){
            foreach($data['results'] as $value){
                
                $groupType  = $value['groupType'];
                $resultType = $value['resultType'];
                $values     = $value['values'];
                $text       = $values[$resultType];
                
                $text_list[] = $text;
            }
        }
        
        return implode("\n", $text_list);
    }
    
    /**
     * POST 方式 发送请求
     * @param string $url
     * @param string $post_data
     * @param int $timeout
     * @return mixed
     */
    public static function post($url, $post_data = '', $timeout = 5){
        
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_POST, 1);
        if($post_data != ''){
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        }
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        
        return $file_contents;
    }
    
    
}


