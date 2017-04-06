<?php
	define('PI', 3.14);					//圆周率定义为常量
	$radius = 15;						//圆半径
	$area = PI * $radius * $radius;		//计算面积
	$length = 2 * PI * $radius;			//计算周长
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>计算圆的周长和面积</title>
<style> 
.tbl{height:30px;line-height:30px;font-family:'simsun';color:#ff0000;margin:0 auto;}
.tbl th{color:#444;font-size:20px;}
.tbl td:nth-child(1){font-weight:bold;color:#444;}
</style>
</head>
<body>
<table class="tbl">
	<tr>
		<th colspan="2">计算圆的周长和面积</th>
	</tr>
	<tr><td>半径：</td><td><?php echo $radius;?></td></tr>
	<tr><td>周长：</td><td><?php echo $length;?></td></tr>
	<tr><td>面积：</td><td><?php echo $area;?></td></tr>
</table>
</body>
</html>