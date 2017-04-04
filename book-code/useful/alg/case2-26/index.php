<?php 
	//初识化数组$arr
	$arr1 = array('name'=>'zhang', 'age'=>23, 'height'=>175);
	$arr2 = array('name2'=>'wang', 'age'=>18, 'height2'=>168);
	//合并数组$arr1和$arr2
	$arr_merge = array_merge($arr1, $arr2);
	//将数组$arr1拆分成含有两个元素的数组
	$arr_chunk = array_chunk($arr1, 2);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>拆分合并</title>
<style> 
body{font-family:'simsun';}
h2{text-align:center;color:#333;}
div{width:240px;padding:10px 0;border:2px dotted #222;background:#f7fcfc;color:#0066b3;}
.left{float:left;margin-right:20px;}
.right{float:left;}
</style>
</head>
<body>
	<h2>拆分合并</h2>
	<div class="left">
		<pre>合并后的数组：<?php print_r($arr_merge);?></pre>
	</div>
	<div class="right">
		<pre>拆分后的数组：<?php print_r($arr_chunk);?></pre>
	</div>
</body>
</html>