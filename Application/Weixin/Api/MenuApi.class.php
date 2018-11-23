<?php 
namespace Weixin\Api;
use Weixin\Api\BaseApi;

/**
 * 创建菜单  Api
 */
class MenuApi extends BaseApi
{
	protected function _initialize()
    {
        parent::_initialize();
    }

	/**
	 * 创建菜单
	 * @param string $menuContent  菜单内容
	 */
	public function	createMenu($menuContent)
	{
	   
	    $access_token = $this->getAccessToken();
	    $interface = $this->wxHost."/cgi-bin/menu/create?access_token=$access_token";
	    
	    $responseSeq = httpPost($interface, $menuContent);
		
		var_dump($responseSeq);exit;

		try {
			$result = $this->responseValidate($responseSeq);
		} catch ( \Exception $e ) {
			$errcode = $e->getCode();
			$errmsg = $e->getMessage();

			/* 再次上抛异常至TP设定的顶层异常处理器中, 输出异常处理模板 */
			throw new \Think\Exception("微信网页授权令牌接口请求错误 <br /> 消息: $errmsg <br /> 错误码: $errcode", $errcode);
		}

		session('openid', $result['openid']); //会话记录当前答题者的openid

		return $result['access_token'];			
	}
	

	public function getMenu(){
	    
	    $access_token = $this->getAccessToken();
	    $interface = $this->wxHost."/cgi-bin/menu/get?access_token=$access_token";
	    
	    //P_R($interface);
	    $responseSeq = httpGet($interface);
	    
	    var_dump($responseSeq);exit;
	    
	    
	}

    
}
?>