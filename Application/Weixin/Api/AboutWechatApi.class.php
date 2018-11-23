<?php
namespace Weixin\Api;
use Weixin\Api\BaseApi;

/**
 * 获取微信服务器信息的Api
 */
class AboutWechatApi extends BaseApi
{
    protected function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 获取微信服务器IP地址
     * @return array  关注者的openid数组
     * @throws \Think\Exception
     */
    public function getCallbackIp()
    {
        $interface = $this->wxHost."/cgi-bin/getcallbackip?access_token={$this->getAccessToken()}";
        $responseSeq = httpGet($interface);
        
        $responseSeq = json_decode($responseSeq,true);
        
        P_R($responseSeq);

        return $responseSeq;
    }

}
