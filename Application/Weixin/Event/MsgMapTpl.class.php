<?php

namespace Weixin\Event;

/**
 * 简易号码簿
 * @author Administrator
 *
 */
class MsgMapTpl{
    
    /**
     * 文本回复接口
     *  定义文本消息回复的内容
     */    
    public static function mapTpl($keyWord){
        switch ($keyWord){
            case 'text':// 返回文本消息模板
                $xmlTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime><![CDATA[%s]]></CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                        </xml>";
                break;
            case 'music':// 返回音乐消息模板
                $xmlTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Music>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <MusicUrl><![CDATA[%s]]></MusicUrl>
                            <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                        </Music>
                    </xml>";
                break;
                
            case 'news':// 图文发送
                $xmlTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <ArticleCount>%s</ArticleCount>
                        <Articles>%s</Articles>
                    </xml>";
                
                
                break;
            case 'news_items':// 图文发送 Items
                $xmlTpl = "<item>
                                <Title><![CDATA[%s]]></Title>
                                <Description><![CDATA[%s]]></Description>
                                <PicUrl><![CDATA[%s]]></PicUrl>
                                <Url><![CDATA[%s]]></Url>
                            </item>";
                
                break;
                
            case 'location':// 返回地理位置消息模板
                $xmlTpl = "";
                
                
                break;               
            default :
                $xmlTpl = '';
                break;
        }
        
        return $xmlTpl;
    }
    
}


