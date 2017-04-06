<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>单引号与双引号</title>
<style> 
h2{text-align:center;color:#222;}
div{width:260px;height:185px;margin:0px auto;font-size:18px;color:#333;font-weight:bold;padding:20px;border:2px dotted #004CB7;}
.in{background:#fff;opacity:0.8;}
.out{background:#F0BFED;}
</style>
</head>
<body>
<h2>单引号与双引号</h2>
<div class="out">
	<div class="in">
	<?php
		//使用单引号
		echo '"Why doesn\'t "this" work?"';
		echo '<br>';
		echo 'c:\network\tables\\';
		echo '<br>';
		echo '变量{$a}的值为"abc"';
		echo '<br>';
		echo '\101BCD';
		echo '<hr>';
		//使用双引号
		echo "\"Why doesn't \"this\" work?\"";
		echo '<br>';
		echo "c:\\network\\tables\\";
		echo '<br>';
		echo "变量{\$a}的值为\"abc\"";
		echo '<br>';
		echo "\\101BCD";
	?>
	</div>
</div>
</body>
</html>