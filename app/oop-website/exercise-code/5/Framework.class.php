<?php
//项目框架类
class Framework{
	private static $_module;	//保存用户请求的模块名（类名）
	private static $_action;	//保存用户请求的操作名（类中的方法名）
	//获取请求参数
	private static function _getParams(){
	   self::$_module = isset($_GET['module']) ? $_GET['module']  : '';
	   self::$_action = isset($_GET['action']) ? $_GET['action']  : '';
	}
	//用户自定义的自动加载方法
	private static function _userAutoLoad($className){
		require "./$className.class.php";
	}
	//注册自动加载
	private static function _registerAutoLoad(){
		//将本类中的userAutoLoad方法注册为自动加载方法
		spl_autoload_register(array('self','_userAutoLoad'));
	}
	//入口方法
	public static function runApp(){
		self::_getParams();	        //获取请求参数
		self::_registerAutoLoad();	//注册自动加载方法
		if(self::$_module || self::$_action){
			//实例化
			$module = new self::$_module();
			//调用成员方法
			$module->{self::$_action}();
		}else{
			echo '文件或操作名为空或不存在';
		}
	}
}
