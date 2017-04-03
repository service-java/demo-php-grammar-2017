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
<h2 class="main-right-nav">学生管理 &gt; 批量添加</h2>
<div class="main-right-addAll">
	<form method="post">
	<table class="table">
		<tr>
			<th>学号</th><th>姓名</th><th>出生年月</th><th>性别</th><th>所属班级</th><th width="60">操作</th>
		</tr>
		<tr align="center" class="js-student">
			<!--学号-->
			<td><input type="text" class="form-text" name="student_number[]"></td>
			<!--姓名-->
			<td><input type="text" class="form-text" name="student_name[]">
			<!--出生年月-->
			<td><input type="text" class="form-text" name="student_birthday[]"></td>
			<!--性别-->
			<td><select name="student_gender[]">
				<option value="男">男</option>
				<option value="女">女</option>
			</select></td>
			<!--所属班级-->
			 <td><select name="class_id[]">
				<?php if(is_array($major_info)): foreach($major_info as $key=>$v): if(is_array($v["Class"])): foreach($v["Class"] as $key=>$vv): ?><option value="<?php echo ($vv["class_id"]); ?>"><?php echo ($v["major_name"]); echo ($vv["class_name"]); ?></option><?php endforeach; endif; endforeach; endif; ?>
			</select></td>
			<td><img id="append" src="/hello-php/app/stuinfo-manage-sys/Public/images/append.png" /> <img id="remove" src="/hello-php/app/stuinfo-manage-sys/Public/images/remove.png" /></td>
		</tr>
		<tr>
			<td colspan="6" align="center">
				<input type="submit" value="确认输入" class="form-btn">
				<input type="reset" value="重新填写" class="form-btn">
			</td>
		</tr>
	</table>
	</form>
</div>
<style>#append,#remove{cursor:pointer;vertical-align:middle}</style>
<script src="/hello-php/app/stuinfo-manage-sys/Public/js/jquery.min.js"></script>
<script>
	$("#append").click(function(){
		tr = $(this).parents("tr");
		tr.clone(true).insertAfter(tr);
	});
	$("#remove").click(function(){
		if( $(".js-student").length > 1){
			tr = $(this).parents("tr");
			$(tr).remove();
		}
	});
</script>
	</div>
	<div class="main-footer">
		<div>学生管理系统　本项目仅供学习使用</div>
	</div>
</div>
</body>
</html>