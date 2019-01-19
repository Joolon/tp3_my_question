<?php 
namespace Common\Controller;
use Think\Controller;

class BaseController extends Controller
{
	/**
	 * 从快速缓存或配置表中加载系统配置信息
	 */
	public function loadSettings()
	{
		$settings = F('settings') ? F('settings') : M('Settings')->getField('name,value');
		C('settings', $settings);
	}
	
	
	/**
	 * 追加一个面包屑导航项目
	 * @param string $name  导航项目名
	 * @param string $path  导航路径
	 */
	protected function bcItemPush($name, $path=''){
	    $tmp = C('breadcrumb');
	    $tmp[] = array('name'=>$name, 'path'=>$path);
	    C('breadcrumb', $tmp);
	    $this->assign('breadcrumb', $tmp);
	}

}
?>