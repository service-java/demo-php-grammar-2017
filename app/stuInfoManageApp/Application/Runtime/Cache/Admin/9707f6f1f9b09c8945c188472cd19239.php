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
<h2 class="main-right-nav">学生管理 &gt; 学生列表</h2>
<div class="main-right-titbox">
	<ul><li><a href="#">学生列表</a></li></ul>
</div>
<form method="post">请选择班级：
	<select name="class_id">
		<?php if(is_array($major_info)): foreach($major_info as $key=>$v): if(is_array($v["Class"])): foreach($v["Class"] as $key=>$vv): ?><option value="<?php echo ($vv["class_id"]); ?>" <?php if(($class_id) == $vv["class_id"]): ?>selected<?php endif; ?>><?php echo ($v["major_name"]); echo ($vv["class_name"]); ?></option><?php endforeach; endif; endforeach; endif; ?>
	</select>
	<input type="submit" value="确定" class="form-btn" />
</form>
<table class="table">
	<tr><th>学号</th><th>姓名</th><th>年龄</th><th>性别</th><th>操作</th></tr>
	<?php if(!empty($student_info)): if(is_array($student_info)): foreach($student_info as $key=>$v): ?><tr align="center">
				<td><?php echo ($v["student_number"]); ?></td>
				<td><?php echo ($v["student_name"]); ?></td>
				<td><?php echo ($v["student_birthday"]); ?></td>
				<td><?php echo ($v["student_gender"]); ?></td>
				<td><div align="center"><a href="/luo-PHP-Web/06-stuInfoManageApp/index.php/admin/student/update/student_id/<?php echo ($v["student_id"]); ?>">编辑</a>&nbsp; &nbsp;<a href="/luo-PHP-Web/06-stuInfoManageApp/index.php/admin/student/delete/student_id/<?php echo ($v["student_id"]); ?>/class_id/<?php echo ($v["class_id"]); ?>"  onclick="javascript:if(confirm('确定要删除此信息吗？')){return true;}return false;">删除</a></div></td>
			</tr><?php endforeach; endif; ?>
		<?php else: ?>
		<tr align="center"><td colspan="5">查询的结果不存在！</td></tr><?php endif; ?>
</table>
<div><a href="/luo-PHP-Web/06-stuInfoManageApp/index.php/admin/student/add/class_id/<?php echo ($class_id); ?>" class="main-right-tita">添加学生</a></div>
	</div>
	<div class="main-footer">
		<div>学生管理系统　本项目仅供学习使用</div>
	</div>
</div>
</body>
</html>