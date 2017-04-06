<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>可变变量延伸</title>
<style>
h2{text-align:center;color:#222;}
.box{margin:20px auto;line-height:35px;border:2px dotted #D60028;padding:0 10px;width:350px;}
</style>
</head>
<body>
<div class="box">
	<h2>可变变量延伸</h2>
	<?php
		//在此处编写PHP代码
		//实现多重$符号的可变变量
		$hello = 'world';
		$world = 'hello';
		echo '多重$符号：';
		echo $world.'&nbsp;';
		echo $$world.'&nbsp;';
		echo $$$world.'&nbsp;';
		echo $$$$world;
		
		//在可变变量中使用{}大括号
		$helloworld = 'ok';
		$php = 'world';
		echo '<br>使用{}大括号：';
		echo ${"hello$php"};
	?>
</div>
</body>
</html>