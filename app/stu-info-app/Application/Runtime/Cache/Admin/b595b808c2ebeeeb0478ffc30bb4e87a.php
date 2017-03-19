<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>学生管理系统</title>
	<link href="/luo-PHP-Web/06-stuInfoManageApp/Public/css/style.css" rel="stylesheet">
</head>
<body>
<div class="top">
	<div class="top-box">
		<h1 class="top-box-logo">学生管理系统</h1>
		<div class="top-box-nav">
			欢迎您！<a href="#">我的信息</a> <a href="#">密码修改</a> <a href="/luo-PHP-Web/06-stuInfoManageApp/index.php/admin/Index/logout">安全退出</a>
		</div>
	</div>
</div>
<div class="main">
	<div class="main-left">
		<div class="main-left-nav">
			<div class="main-left-nav-head">
				<strong>院系专业</strong><div></div>
			</div>
			<a href="/luo-PHP-Web/06-stuInfoManageApp/index.php/admin/Major/showList">专业列表</a>
			<a href="#">添加专业</a>

			<div class="main-left-nav-head">
				<strong>学生管理</strong><div></div>
			</div>
			<div class="main-left-nav-list">
				<div><a href="/luo-PHP-Web/06-stuInfoManageApp/index.php/admin/Student/showList">学生列表</a></div>
				<div><a href="/luo-PHP-Web/06-stuInfoManageApp/index.php/admin/Student/add">添加学生</a></div>
				<div><a href="/luo-PHP-Web/06-stuInfoManageApp/index.php/admin/Student/addAll">批量添加</a></div>
			</div>
			<div class="main-left-nav-head">
				<strong>系统设置</strong><div></div>
			</div>
			<div class="main-left-nav-list">
				<div><a href="#">修改密码</a></div>
			</div>

			<div class="main-left-nav-head">
				<strong>教学系统</strong><div></div>
			</div>
		</div>
	</div>
	<div class="main-right">	
<div class="main-right-index"><h1><?php echo ($admin_name); ?>，您好！欢迎使用学生管理系统。</h1></div>
	</div>
	<div class="main-footer">
		<div>学生管理系统　本项目仅供学习使用</div>
	</div>
</div>
</body>
</html>