<?php
header('Content-Type:text/html;charset=utf-8');
//启动SESSION
session_start();
//用户退出
if(isset($_GET['action']) && $_GET['action']=='logout'){
	//清除COOKIE数据
	setcookie('username','',time()-1);
	setcookie('password','',time()-1);
	//清除SESSION数据
	unset($_SESSION['userinfo']);
	//如果SESSION中没有其他数据，则销毁SESSION
	if(empty($_SESSION)){
		session_destroy();
	}
	//跳转到登录页面
	header('Location: login.php');
	//终止脚本
	exit;
}
//判断SESSION中是否存在用户信息
if(isset($_SESSION['userinfo'])){
	//用户信息存在，说明用户已经登录
	define('IS_LOGIN', true);  //设置常量，表示用户登录状态
	$userinfo = $_SESSION['userinfo'];  //获取用户信息
}else{
	//用户信息不存在，说明用户没有登录
	define('IS_LOGIN', false);
}
//加载HTML模板文件
require './view/index.html';