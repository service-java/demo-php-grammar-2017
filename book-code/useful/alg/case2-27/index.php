<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>模拟栈操作</title>
<style> 
body{background:#555;font-family:'simsun';}
h2{text-align:center;color:#fff;}
.output{width:400px;padding:20px;margin:15px auto;border:2px solid #01ff02;background:#fff;}
</style>
</head>
<body>
	<h2>模拟栈操作</h2>
	<div class="output">
	<?php
		$arr = array();
		array_unshift($arr, 'a');
		print_r($arr);echo '<hr>';
		array_unshift($arr, 'b');
		print_r($arr);echo '<hr>';
		array_unshift($arr, 'c');
		print_r($arr);echo '<hr>';
		array_unshift($arr, 'd');
		print_r($arr);echo '<hr>';
		array_unshift($arr, 'e');
		print_r($arr);echo '<hr>';

		array_pop($arr);
		print_r($arr);echo '<hr>';
		array_pop($arr);
		print_r($arr);echo '<hr>';
		array_pop($arr);
		print_r($arr);echo '<hr>';
		array_pop($arr);
		print_r($arr);
	?>
	</div>
</body>
</html>