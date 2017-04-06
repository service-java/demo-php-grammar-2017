<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>变量与数组函数互相转换</title>
<style> 
body{background:#555;font-family:'simsun';}
h2{text-align:center;color:#fff;}
.output{width:298px;padding:20px;margin:15px auto;border:2px solid #01ff02;background:#fff;}
</style>
</head>
<body>
	<h2>变量与数组函数互相转换</h2>
	<?php
		//定义变量
		$name = 'zhang';
		$gender = 'female';
		$age = 20;
		//将变量转换为数组
		$arr_new = compact('name', 'gender', 'age');
	?>
	<div class="output">变量转数组：<pre><?php print_r($arr_new); ?></pre></div>
	<?php
		//定义关联数组
		$arr = array('dbhost'=>'localhost', 'dbuser'=>'root', 'dbpwd'=>'123456');
		//使用extract()函数将数组转换为变量
		extract($arr);
	?>
	<div class="output">数组转变量：<?php echo $dbhost.'，'.$dbuser.'，'.$dbpwd; ?></div>
 </body>
</html>