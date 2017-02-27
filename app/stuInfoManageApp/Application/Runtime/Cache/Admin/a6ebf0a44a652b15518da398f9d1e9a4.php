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
<h2 class="main-right-nav">学生管理 &gt; 学生修改</h2>
<div class="main-right-table">
	<form method="post">
	<input type="hidden" name="student_id" value="<?php echo ($student_info["student_id"]); ?>"/>
	<table class="table">
		<tr>
			<th>学号：</th>
			<td><input value="<?php echo ($student_info["student_number"]); ?>" type="text" class="form-text" name="student_number" required></td>
		</tr>
		<tr>
			<th>姓名：</th>
			<td><input value="<?php echo ($student_info["student_name"]); ?>" type="text" class="form-text" name="student_name" required></td>
		</tr>
		<tr>
			<th>出生年月：</th>
			<td><input value="<?php echo ($student_info["student_birthday"]); ?>" type="text" class="form-text" name="student_birthday" required></td>
		</tr>
		<tr>
			<th>性别：</th><td><select name="student_gender">
				<option value="男" <?php if(($student_info["student_gender"]) == "男"): ?>selected<?php endif; ?> >男</option>
				<option value="女" <?php if(($student_info["student_gender"]) == "女"): ?>selected<?php endif; ?> >女</option>
			</select></td>
		</tr>
		<tr>
			<th>所属班级：</th><td><select name="class_id">
				<?php if(is_array($major_info)): foreach($major_info as $key=>$v): if(is_array($v["Class"])): foreach($v["Class"] as $key=>$vv): ?><option value="<?php echo ($vv["class_id"]); ?>" <?php if(($student_info["class_id"]) == $vv["class_id"]): ?>selected<?php endif; ?>><?php echo ($v["major_name"]); echo ($vv["class_name"]); ?></option><?php endforeach; endif; endforeach; endif; ?>
			</select></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="确认更新" class="form-btn">
				<input type="reset" value="重新填写" class="form-btn">
			</td>
		</tr>
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