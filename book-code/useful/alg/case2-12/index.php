<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>函数的调用</title>
<style>
body{background:#999;}
h2{text-align:center;color:#222;}
.box{width:550px;background:#fff; margin:5px auto;font-size:18px;font-weight:bold;padding:0 20px 20px 20px;}
</style>
</head>
<body>
<h2>函数的调用</h2>
<div class="box">
	<?php
		echo getMin(23, 17);
		include './functions_inc.php';
	?>
</div>
</body>
</html>