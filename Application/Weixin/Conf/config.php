<?php
return array(
	//'配置项'=>'配置值'
	
    'TOKEN' => 'jolon',
    'WX_HOST' => 'https://api.weixin.qq.com',// 微信 API 主机域名
    
    
    // 公众号菜单配置
    'MENU_CONTENT' => '{
             "button":[
             {
                  "type":"click",
                  "name":"最新消息",
                  "key":"C_NEWS"
              },
             {
                  "type":"click",
                  "name":"问卷调查",
                  "key":"C_QUEST"
              },
              {
                   "name":"更多",
                   "sub_button":[
                   {
                       "type":"scancode_push",
                       "name":"扫一扫",
                       "key":"C_SCAN"
                    },
                   {
                       "type":"scancode_waitmsg",
                       "name":"扫码推",
                       "key":"C_SCAN_2"
                    },
                   {
                       "type":"location_select",
                       "name":"发送位置",
                       "key":"C_LOCAL"
                    },
                    {
                       "type":"click",
                       "name":"喜欢我们就点我吧",
                       "key":"C_GOOD"
                    },
                    {
                       "type":"view",
                       "name":"关于我们",
                       "url":"http://www.soso.com/"
                    }]
               }]
            }',
    
    
);