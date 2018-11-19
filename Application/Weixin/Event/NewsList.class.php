<?php

namespace Weixin\Event;

/**
 * 图文消息获取类
 * @author Administrator
 *
 */
class NewsList{

    /**
     * 图文消息列表
     * @param int $count
     * @return array
     */
    public static function getNewsList($count = 3){
        $count = ($count > 10)?10:($count<=0 ? 3:$count);// 最大最小个数限制
        
        $list = [];
        for($i = 1;$i <= $count;$i ++){
            $data = [
                'title'     => "刘诗诗 I Love You beauty1-0".sprintf("%02d",$i).".jpg",
                'desc'      => "这是个美女图片，你可要认真看喔",
                'picUrl'    => PUBLIC_IMG_WECHAT."beauty1-0".sprintf("%02d",$i).".jpg",
                'url'       => HTTP_HOST,
                
            ];
            
            $list[] = $data;
        }
        
        return $list;
    }
    
}


