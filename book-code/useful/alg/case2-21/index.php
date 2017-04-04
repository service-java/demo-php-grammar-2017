<?php 
	//使用[]直接赋值方式定义数组
	//定义一个关联数组
	$arr1['name'] = 'li';
	$arr1['age'] = 20;
	$arr1['gender'] = 'male';
	//定义一个索引数组
	$arr2[] = 'li';
	$arr2[] = 20;
	$arr2[] = 'male';
	//通过这种方式不能定义一个空数组，因为它本身就是在定义数组的某个元素
	$arr3[] = '';
	
	//使用array()函数方式定义数组
	//定义一个关联数组
	$arr4 = array('name'=>'li','age'=>20,'gender'=>'male');
	//定义一个索引数组
	$arr5 = array('li',20,'male');
	//定义一个空数组
	$arr6 = '';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>定义数组</title>
<style> 
body{font-family:'simsun';}
h2{text-align:center;color:#333;}
.box{width:600px;padding:20px;border:2px dotted #222;background:#f7fcfc;margin:20px auto;line-height:40px;color:#0066b3;}
</style>
</head>
<body>
	<h2>定义数组</h2>
	<div class="box">
		[]方式定义关联数组：<?php print_r($arr1); ?><br />
		[]方式定义索引数组：<?php print_r($arr2); ?><br />
		[]方式定义空元素数组：<?php print_r($arr3); ?>
	</div>	
	<div class="box">
		array()方式定义关联数组：<?php print_r($arr4); ?><br />
		array()方式定义索引数组：<?php print_r($arr5); ?><br />
		array()方式定义空数组：<?php print_r($arr6); ?>
	</div>
</body>
</html>