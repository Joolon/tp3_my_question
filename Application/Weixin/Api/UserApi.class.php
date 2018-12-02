<?php
namespace Weixin\Api;
use Weixin\Api\BaseApi;

/**
 * 用户管理Api
 */
class UserApi extends BaseApi
{
    protected function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 获取当前关注用户openid列表（next_openid为空表示以获取所有列表）
     * @return array  关注者的openid数组
     * @throws \Think\Exception
     */
    public function getSubscriberIDs($next_openid = null)
    {
        $interface = $this->wxHost."/cgi-bin/user/get?access_token={$this->accessToken}";
        if($next_openid) $interface .= "&next_openid={$next_openid}";
        
        $responseSeq = httpGet($interface);
        try{
            $result = $this->responseValidate($responseSeq);
        } catch( \Exception $e ){
            $errcode = $e->getCode();
            $errmsg = $e->getMessage();

            /* 再次上抛异常至TP设定的顶层异常处理器中, 输出异常处理模板 */
            throw new \Think\Exception("获取用户列表失败 <br /> 消息: $errmsg <br /> 错误码: $errcode", $errcode);
        }

        return $result['data'];
    }
    
    /**
     * 获取 黑名单用户列表
     * @return string  $begin_openid
     * @throws \Think\Exception
     */
    public function getBlackList($begin_openid = null)
    {
        $interface = $this->wxHost."/cgi-bin/tags/members/getblacklist?access_token={$this->accessToken}";
        
        $responseSeq = httpPost($interface,json_encode(array('begin_openid' => $begin_openid)));
        try{
            $result = $this->responseValidate($responseSeq);
        } catch( \Exception $e ){
            $this->showExceptionError($e);
        }
        
        return isset($result['data'])?$result['data']:array();
    }
    

    /**
     * 获取指定用户的个人信息
     * @param string $openid  指定用户的id
     * @return assoc-array  用户个人信息的关联数组
     * @throws \Think\Exception
     */
    public function getUserInfoByopenId($openid)
    {
        $interface = $this->wxHost."/cgi-bin/user/info?access_token={$this->accessToken}&openid=$openid&lang=zh_CN";
        $responseSeq = httpGet($interface);

        try{
            $result = $this->responseValidate($responseSeq);
        } catch( \Exception $e ){
            $errcode = $e->getCode();
            $errmsg = $e->getMessage();

            /* 再次上抛异常至TP设定的顶层异常处理器中, 输出异常处理模板 */
            throw new \Think\Exception("获取用户 $openid 的个人信息失败 <br /> 消息: $errmsg <br /> 错误码: $errcode", $errcode);
        }

        return $result;
    }
    
    /**
     * 
     * @param unknown $openid
     * @param unknown $remark
     */
    public function setUserReamrk($openid,$remark){
        if(empty($openid) OR empty($remark)) return false;
        
        $remarkContent  = array('openid' => $openid,'remark' => $remark);
        $interface      = $this->wxHost."/cgi-bin/user/info/updateremark?access_token={$this->accessToken}";
        $responseSeq    = httpPost($interface,json_encode($remarkContent,JSON_UNESCAPED_UNICODE));
        
        try{
            $result = $this->responseValidate($responseSeq);
        } catch( \Exception $e ){
            $errcode = $e->getCode();
            $errmsg = $e->getMessage();
            
            /* 再次上抛异常至TP设定的顶层异常处理器中, 输出异常处理模板 */
            throw new \Think\Exception("获取用户 $openid 的个人信息失败 <br /> 消息: $errmsg <br /> 错误码: $errcode", $errcode);
        }
        
        return $result;
        
    }
    
    /**
     * 把用户  加入或移出  黑名单用户列表
     * @param unknown $openid_list
     * @param string $type    build.设置，其他.移出黑名单
     * @return boolean|mixed
     */
    public function setUserBlackFlag($openid_list,$type = 'build'){
        if(empty($openid_list)) return false;
        
        $forContent   = array('openid_list' => (is_array($openid_list)?$openid_list:[$openid_list]));
        if($type == 'build'){
            $interface      = $this->wxHost."/cgi-bin/tags/members/batchblacklist?access_token={$this->accessToken}";
        }else{
            $interface      = $this->wxHost."/cgi-bin/tags/members/batchunblacklist?access_token={$this->accessToken}";
        }
        $responseSeq    = httpPost($interface,json_encode($forContent));
        $responseSeq    = json_decode($responseSeq,true);
        return $responseSeq;
        
    }
    
    
    
}
