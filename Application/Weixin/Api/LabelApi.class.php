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

}
