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
// 	    echo 1;exit;
	    
// 	    print_r((new \Weixin\Api\LabelApi())->getTagFormUser('oHrvU088baFpBDsDE6WLOvxJg2vM'));
// 	    exit;
// 	    P_R((new \Weixin\Api\LabelApi())->getUserListByTag(105));
// 	    P_R((new \Weixin\Api\LabelApi())->setTagForUser('oHrvU088baFpBDsDE6WLOvxJg2vM',105,''));
	    P_R( (new \Weixin\Api\UserApi())->getBlackList() );
	    P_R( (new \Weixin\Api\UserApi())->setUserBlackFlag('oHrvU088baFpBDsDE6WLOvxJg2vM',12) );
	    P_R( (new \Weixin\Api\UserApi())->setUserReamrk('oHrvU088baFpBDsDE6WLOvxJg2vM','pingchangxin') );
	    
	    
	    
	    
	    
// 	    $menuContent = C('MENU_CONTENT');
// 	    var_dump($menuContent);exit;
	    
// 	    $labelContent = array('tag' => array('name' => '国际用户VIP+++123'));
	    P_R((new \Weixin\Api\LabelApi())->getLabel());
// 	    $labelContent = array('tag' => array('id' => 109, 'name' => '国内用123'));
// 	    $labelContent = json_encode($labelContent,JSON_UNESCAPED_UNICODE);
// 	    P_R($labelContent);
// 	    (new \Weixin\Api\LabelApi())->deleteLabel(109);
// 	    (new \Weixin\Api\LabelApi())->updateLabel(109,'国内用123');
// 	    (new \Weixin\Api\LabelApi())->createLabel($labelContent);
	    
	    
	    
	    exit;
	    
	}

}
?>