<?php
header('Content-Type:text/html;charset=utf-8');
//保存正确的用户名和密码
define('USERNAME', 'admin');
define('PASSWORD', '123456');
//保存错误信息
$error = array();
//当有表单提交时
if($_POST){
	//接收用户登录表单
	$username = isset($_POST['username']) ? trim($_POST['username']) : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	//验证用户名和密码
	if($username == USERNAME && $password == PASSWORD){
		//判断用户是否勾选了记住密码
		if(isset($_POST['auto_login']) && $_POST['auto_login']=='yes'){
			//将用户名和密码保存到COOKIE，并对密码加密
			$ua = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''; //将UA信息放入算法中
			$password_cookie = md5(PASSWORD.md5($ua));
			$cookie_expire = time()+2592000;                        //保存1个月(60*60*24*30)
			setcookie('username',$username,$cookie_expire);         //保存用户名
			setcookie('password',$password_cookie,$cookie_expire);  //保存密码
		}
		//登录成功，保存用户会话
		session_start();
		$_SESSION['userinfo'] = array(
			'username' => $username  //将用户名保存到SESSION
		);
		//登录成功，跳转到会员中心
		header('Location: index.php');
		//终止脚本继续执行
		exit;
	}else{
		$error[] = '用户名或密码错误。';
	}
}
//当COOKIE中存在登录状态时
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
	//取出用户名和密码
	$username = $_COOKIE['username'];
	$password = $_COOKIE['password'];
	//计算COOKIE密码
	$ua = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
	$password_cookie = md5(PASSWORD.md5($ua));
	//判断用户名和密码
	if($username == USERNAME && $password == $password_cookie){
		//登录成功，保存用户会话
		session_start();
		$_SESSION['userinfo'] = array(
			'username' => $username  //将用户名保存到SESSION
		);
		//登录成功，跳转到会员中心
		header('Location: index.php');
		//终止脚本继续执行
		exit;
	}
}
//加载HTML模板文件
require './view/login.html';