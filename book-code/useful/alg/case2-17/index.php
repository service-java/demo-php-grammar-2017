<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>函数中变量的作用域</title>
<style>
h2{text-align:center;}
.box{width:350px;border:2px dotted #FE0D0B;padding:0 10px 10px 10px;margin:20px auto;}
</style>
</head>
<body>
<div class="box">
	<h2>函数中变量的作用域</h2>
	<?php
		function getArea(){
			$radius = $GLOBALS["radius"];
			//global $radius;
			$area = round(pi()*pow($radius,2),2);
			return $area;
		}
		//圆的半径
		$radius = 4;
		echo '圆的面积：'.getArea();
	?>
</div>
</body>
</html>