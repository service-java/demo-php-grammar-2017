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
	//入口方法
	public static function runApp(){
		self::_getParams();	 //获取请求参数
		if(self::$_module || self::$_action){
			//加载类库文件
			require './'.self::$_module.'.class.php';
			//将变量的值作为类名实例化
			$module = new self::$_module();
			//将变量的值作为方法名调用
			$module->{self::$_action}();
		}else{
			echo '文件或操作名为空或不存在';
		}
	}
}
