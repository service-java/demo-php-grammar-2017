<?php 
	//定义数组
	$arr = array('zhang', 'wang', 'li', 'zhao');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>输出数组</title>
<style>
body{font-family:'simsun';}
div{width:200px;padding:10px;border:2px dotted #222;background:#f7fcfc;color:#0066b3;}
h2{text-align:center;color:#333;}
.left{float:left;margin-right:20px;}
.right{float:left;}
</style>
</head>
<body>
	<h2>输出数组</h2>
	<div class="left">
		<pre>print_r：<?php print_r($arr); ?></pre>
	</div>
	<div class="right">
		<pre>var_dump：<?php var_dump($arr); ?></pre>
	</div>
</body>
</html>