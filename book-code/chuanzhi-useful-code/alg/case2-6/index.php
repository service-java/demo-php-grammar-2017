<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>逻辑运算符短路问题</title>
<style> 
body{font-family:'simsun';}
h2{text-align:center;color:#222;}
.box{width:250px;margin:3px auto;font-size:18px;padding:20px;border:2px dotted #15A0F5;line-height:35px;}
</style>
</head>
<body>
<h2>逻辑运算符短路问题</h2>
<div class="box">
	<?php
		//在此处编写PHP代码
		$a=3;
		echo '执行前：$a='.$a.'&nbsp;';
		(1==2) && $a=6;  //左边结果为false，则右边$a=6不会执行。
		echo '执行后：$a='.$a;
			
		echo '<br>';
		$b=3;
		echo '执行前：$b='.$b.'&nbsp;';
		(1==2) || $b=6;  //左边结果为false，则执行右边的操作。
		echo '执行后：$b='.$b;
	?>
</div>
</body>
</html>