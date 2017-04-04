<?php
	//初识化数组$arr1
	$arr1 = array(
		'0' => array('fid' => 1,'tid' => 1, 'name' => 'Name1'),
		'1' => array('fid' => 1,'tid' => 2, 'name' => 'Name2'),
		'2' => array('fid' => 1,'tid' => 5, 'name' => 'Name3'),
		'3' => array('fid' => 1,'tid' => 7, 'name' => 'Name4'),
		'4' => array('fid' => 3,'tid' => 9, 'name' => 'Name5'),
	);
	//初始化临时数组$arr_temp和保存最终结果的数组$arr2
	$arr_temp = $arr2 = array();
	//遍历数组$arr1
	foreach($arr1 as $v){
		//从数组$v中索引位置为1的地方开始取出键值数组，
		$temp = array_slice($v,1);
		//将取出的数组$temp保存到$arr_temp中
		$arr_temp[$v['fid']][] = $temp;
	}
	//按照要求，获取从0开始的数组
	foreach($arr_temp as $v){
		$arr2[] = $v;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>array_slice()</title>
<style> 
body{font-family:'simsun';}
h2{text-align:center;color:#333;}
div{width:320px;padding:10px 0;border:2px dotted #222;background:#f7fcfc;color:#0066b3;line-height:10px;font-size:12px;}
.left{float:left;margin-right:20px;}
.right{float:left;}
</style>
</head>
<body>
	<h2>array_slice()</h2>
	<div class="left">
		<pre>变换前：<?php print_r($arr1); ?></pre>
	</div>
	<div class="right">
		<pre>变换后：<?php print_r($arr2); ?></pre>
	</div>
</body>
</html>