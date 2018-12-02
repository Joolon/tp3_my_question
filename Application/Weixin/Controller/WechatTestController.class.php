<?php 
namespace Weixin\Controller;

use Common\Controller\BaseController;
// use Library\HttpTool;


/**
 * 运行在公众号连接的回调模式下
 * 对接微信服务器，响应来自其推送的普通消息或操作事件
 */
class WechatTestController extends BaseController
{
	protected function _initialize()
	{
	    
	}


	/**
	 * 监听微信公众平台推送的普通消息或操作事件
	 */
	public function index()
	{
	    
	    
	    
	    $menuContent = C('MENU_CONTENT');
// 	    var_dump($menuContent);exit;
	    (new \Weixin\Api\MenuApi())->createMenu($menuContent);
	    
	    
	    
	    exit;
	    
	}

}
?>