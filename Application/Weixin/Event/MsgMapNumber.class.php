<?php

namespace Weixin\Event;

/**
 * 简易号码簿
 * @author Administrator
 *
 */
class MsgMapNumber{
    
    /**
     * 文本回复接口
     *  定义文本消息回复的内容
     */    
    public static function mapMsg($keyWord){
        $msgType = 'text';
        if(is_numeric($keyWord) OR $keyWord == '？' OR $keyWord == '?'){
            $msgType = 'text';
            
            switch ($keyWord){
                case '?':
                case '？':
                    $content = ["【1】特种号码","【2】通讯号码","【3】银行号码","【100】歌单","输入序号可获取帮助"];
                    break;
                case '1':
                    $content = [ "常用特种号码：","匪警：110","火警：119"];
                    break;
                    
                case '2':
                    $content = ["常用服务号码：","中移动：10086","中联通：10010"];
                    break;
                case '3':
                    $content = ["常用银行号码：","工商银行：95588","建设银行：95533"];
                    break;
                    
                    
                case '100':
                    $content = ["Dream It Possible","清风莞月浮舟令","年少心事"];
                    break;
                    
                default :
                    $content = ["请输入正确的消息","输入问号 查看帮助"];
                    break;
            }
            
            $content = implode("\n", $content);
            return ['msgType' => $msgType,'content' => $content];
            
        }elseif(in_array($keyWord,['Dream','清风莞月浮舟令','年少心事'])){
            $msgType = 'music';
            
            switch ($keyWord){
                case 'Dream':
                    $content = [
                        'title' => 'Dream It Possible',
                        'desc'  => '《Dream It Possible》...',
                        'url'   => HTTP_HOST.'/Public/Audios/wechat/music/Dream It Possible.mp3',
                        'hqurl' => HTTP_HOST.'/Public/Audios/wechat/hqmusic/Dream It Possible.mp3'
                    ];
                    break;
                    
                case '清风莞月浮舟令':
                    $content = [
                        'title' => '清风莞月浮舟令',
                        'desc'  => '《许多葵 - 清风莞月浮舟令》...',
                        'url'   => HTTP_HOST.'/Public/Audios/wechat/music/许多葵 - 清风莞月浮舟令.mp3',
                        'hqurl' => HTTP_HOST.'/Public/Audios/wechat/hqmusic/许多葵 - 清风莞月浮舟令.mp3'
                    ];
                    break;
                    
                case '年少心事':
                    $content = [
                        'title' => '年少心事',
                        'desc'  => '王一博 - 年少心事...',
                        'url'   => HTTP_HOST.'/Public/Audios/wechat/music/王一博 - 年少心事.mp3',
                        'hqurl' => HTTP_HOST.'/Public/Audios/wechat/hqmusic/王一博 - 年少心事.mp3'
                    ];
                    break;
                    
                default :
                    $content = ["请输入正确的消息","输入问号 查看帮助"];
                    break;
            }
            
            return ['msgType' => $msgType,'content' => $content];
        }elseif($keyWord == '图文'){
            $keyWord = 'news';
            
            return ['msgType' => $keyWord,'content' => ''];
            
        }
        
        return ['msgType' => $msgType,'content' => ''];
        
    }
    
}


