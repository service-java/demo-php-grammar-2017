<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>交换两个变量的值</title>
<style>
body{background:#555;font-family:'simsun';}
h2{text-align:center;color:#fff;}
.output{width:298px;padding:20px;margin:15px auto;border:2px solid #01FF02;background:#fff;text-align:center;}
</style>
</head>
<body>
<h2>交换两个变量的值</h2>
<?php
	//定义变量
	$a = 10;
	$b = 20;
?>
<div class="output">交换前：<?php echo '变量a='.$a,'，变量b='.$b; ?></div>
<?php
	//交换$a与$b的值
	$temp = $a;
	$a = $b;
	$b = $temp;
?>
<div class="output">交换后：<?php echo '变量a='.$a,'，变量b='.$b; ?></div>
</body>
</html>