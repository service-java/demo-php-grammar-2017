<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>注册页</title>
	<link rel="stylesheet" href="../assets/style.css">
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

</head>
<body>
	<!-- 顶部 -->
	<?php include("top_login.html"); ?>

	<!-- 连接数据库 -->
	<?php include("conn.php"); ?>
	<div class="container">
		<!-- 注册信息 -->
		<?php include("register_form.php");?>

		<!-- 页脚 -->
		<?php include("footer.html"); ?>
	</div>
</body>
</html>