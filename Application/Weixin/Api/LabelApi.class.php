<?php
namespace Weixin\Api;
use Weixin\Api\BaseApi;

/**
 * 用户标签管理 Api
 */
class LabelApi extends BaseApi
{
    protected function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 创建一个标签
     * @return array  关注者的openid数组
     * @throws \Think\Exception
     * 
     * exp. $labelContent => array('tag' => array('name' => '国际用户VIP'));
     */
    public function createLabel($labelName)
    {
        if($labelName){
            $labelContent = array('tag' => array('name' => $labelName));
            $interface    = $this->wxHost."/cgi-bin/tags/create?access_token={$this->accessToken}";
            $responseSeq  = httpPost($interface, json_encode($labelContent,JSON_UNESCAPED_UNICODE));
            $responseSeq  = json_decode($responseSeq,true);
            return $responseSeq;
        }else{
            return false;
        }
    }
    
    /**
     * 获取标签
     */
    public function getLabel()
    {
        $interface   = $this->wxHost."/cgi-bin/tags/get?access_token={$this->accessToken}";
        $responseSeq = httpPost($interface);
        $responseSeq = json_decode($responseSeq,true);
        
        return $responseSeq;
    }
    
    /**
     * 更新标签
     * @param unknown $label_id
     * @param unknown $label_name
     * @return mixed
     */
    public function updateLabel($label_id,$label_name)
    {
        if($label_id AND $label_name){
            $labelContent   = array('tag' => array('id' => $label_id, 'name' => $label_name));
            $interface      = $this->wxHost."/cgi-bin/tags/update?access_token={$this->accessToken}";
            $responseSeq    = httpPost($interface,json_encode($labelContent,JSON_UNESCAPED_UNICODE));// 不转义中文
            $responseSeq    = json_decode($responseSeq,true);
            return $responseSeq;
        }else{
            return false;
        }
    }
    
    
    /**
     * 删除标签
     * @param unknown $labelId
     * @return mixed
     */
    public function deleteLabel($labelId)
    {
        if(empty($labelId)) return false;
        
        $labelContent   = array('tag' => array('id' => $labelId));
        $interface      = $this->wxHost."/cgi-bin/tags/delete?access_token={$this->accessToken}";
        $responseSeq    = httpPost($interface,json_encode($labelContent));
        $responseSeq    = json_decode($responseSeq,true);
        return $responseSeq;
    }
    
    
    /**
     * 根据 标签获取用户列表
     * @param unknown $tagid
     * @param string $next_openid
     * @return boolean|mixed
     */
    public function getUserListByTag($tagid,$next_openid = ''){
        if(empty($tagid)) return false;
        
        $queryContent   = array('tagid' => $tagid,'next_openid' => $next_openid);
        $interface      = $this->wxHost."/cgi-bin/user/tag/get?access_token={$this->accessToken}";
        $responseSeq    = httpPost($interface,json_encode($queryContent));
        $responseSeq    = json_decode($responseSeq,true);
        return $responseSeq;
    }
    
    /**
     * 给用户 设置或取消标签
     * @param unknown $openid_list
     * @param unknown $tagid
     * @param string $type   build.设置标签，其他.取消标签
     * @return boolean|mixed
     */
    public function setTagForUser($openid_list,$tagid,$type = 'build'){
        if(empty($openid_list) OR empty($tagid)) return false;
        
        $forContent   = array(
            'openid_list'   => (is_array($openid_list)?$openid_list:[$openid_list]),
            'tagid'         => $tagid
        );
        if($type == 'build'){
            $interface      = $this->wxHost."/cgi-bin/tags/members/batchtagging?access_token={$this->accessToken}";
        }else{
            $interface      = $this->wxHost."/cgi-bin/tags/members/batchuntagging?access_token={$this->accessToken}";
        }
        $responseSeq    = httpPost($interface,json_encode($forContent));
        $responseSeq    = json_decode($responseSeq,true);
        return $responseSeq;
        
    }
    
    
    /**
     * 获取用户身上的 标签
     * @param unknown $openid
     * @return boolean|mixed
     */
    public function getTagFormUser($openid){
        if(empty($openid)) return false;
        
        $forContent     = array('openid' => $openid);
        $interface      = $this->wxHost."/cgi-bin/tags/getidlist?access_token={$this->accessToken}";
        $responseSeq    = httpPost($interface,json_encode($forContent));
        $responseSeq    = json_decode($responseSeq,true);
        return $responseSeq;
        
    }

}
