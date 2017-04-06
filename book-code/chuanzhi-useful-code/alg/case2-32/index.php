<?php

//使数组中的每个元素都乘以2的函数
function two($value){
	return $value*2;
}

$old = array(1,2,3,4,5);
//使用回调函数对数组的元素进行操作
$new = array_map('two',$old);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>回调函数</title>
<style>
body{font-family:'simsun';}
h2{text-align:center;}
span{float:left;margin-top:30px;}
.before,.after{width:420px;}
.after{clear:both;}
.ball{display:block;border-radius:50%;height:40px;line-height:38px;width:40px;margin:20px 5px;text-align:center;color:#0a4376;font-weight:bolder;box-shadow:0px 0px 6px 6px #d0e8f4 inset;opacity:0.75;float:left;font-size:14px;}
</style>
</head>
<body>
	<h2>回调函数</h2>

	<div class="before">
		<span>设置数组初识值：</span>
		<?php foreach($old as $v): ?>
		<div class="ball"><?php echo $v; ?></div>
		<?php endforeach; ?>
	</div>
	
	<div class="after">
		<span>调用回调函数后：</span>
		<?php foreach($new as $v): ?>
		<div class="ball"><?php echo $v; ?></div>
		<?php endforeach; ?>
	</div>
</body>
</html>