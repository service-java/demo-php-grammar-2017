<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>学生管理系统</title>
	<link href="/hello-php/app/stuinfo-manage-sys/Public/css/style.css" rel="stylesheet">
	<!-- /hello-php/app/stuinfo-manage-sys/Public 即public目录 -->
</head>
<body>
<div class="top">
	<div class="top-box">
		<h1 class="top-box-logo">学生管理系统</h1>
		<div class="top-box-nav">
			欢迎您！<a href="#">我的信息</a> <a href="#">密码修改</a> <a href="/hello-php/app/stuinfo-manage-sys/index.php/admin/Index/logout">安全退出</a>
		</div>
	</div>
</div>
<div class="main">
	<div class="main-left">
		<div class="main-left-nav">
			<div class="main-left-nav-head">
				<strong>院系专业</strong><div></div>
			</div>
			<a href="/hello-php/app/stuinfo-manage-sys/index.php/admin/Major/showList">专业列表</a>
			<!-- /hello-php/app/stuinfo-manage-sys/index.php/admin 这里指Admin模块 -->
			<a href="#">添加专业</a>

			<div class="main-left-nav-head">
				<strong>学生管理</strong><div></div>
			</div>
			<div class="main-left-nav-list">
				<div><a href="/hello-php/app/stuinfo-manage-sys/index.php/admin/Student/showList">学生列表</a></div>
				<div><a href="/hello-php/app/stuinfo-manage-sys/index.php/admin/Student/add">添加学生</a></div>
				<div><a href="/hello-php/app/stuinfo-manage-sys/index.php/admin/Student/addAll">批量添加</a></div>
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
<div class="main-right-login">
	<form method="post">
	<table class="table">
		<tr><th>用户名：</th><td>
			<input type="text" class="form-text" name="aname">
		</td></tr>
		<tr><th>密 码：</th><td>
			<input type="password" class="form-text" name="apwd">
		</td></tr>
		<tr><td colspan="2" align="center">
				<input type="submit" value="确认输入" class="form-btn" />
				<input type="reset" value="重新填写" class="form-btn" />
		</td></tr>
	</table>
	</form>
</div>
	</div>
	<div class="main-footer">
		<div>学生管理系统　本项目仅供学习使用</div>
	</div>
</div>
</body>
</html>