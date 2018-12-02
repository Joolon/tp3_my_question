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
	    $access_token  = $this->getAccessToken();
	    $interface     = $this->wxHost."/cgi-bin/menu/create?access_token=$access_token";
	    $responseSeq   = httpPost($interface, $menuContent);
	    P_R($responseSeq);

		try {
			$result = $this->responseValidate($responseSeq);
		} catch ( \Exception $e ) {
			$this->showExceptionError($e);
		}

		session('openid', $result['openid']); //会话记录当前答题者的openid
		return $result['access_token'];			
	}
	

	public function getMenu(){
	    
	    $access_token = $this->getAccessToken();
	    $interface = $this->wxHost."/cgi-bin/menu/get?access_token=$access_token";
	    
	    //P_R($interface);
	    $responseSeq = httpGet($interface);
	    
	    P_R_J($responseSeq);
	}

    
}
?>