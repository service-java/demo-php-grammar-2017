<?php 
	function implode_key($glue = "", $pieces = array()) { 
		$arrK = array_keys($pieces); 
		return implode($glue, $arrK); 
	}
	$arr = array(
		'banana' => 'yellow',
		'apple'=> 'red',
		'grape'=>'purple',
	);
	$key_new = implode_key("_",$arr);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>implode()函数</title>
<style> 
body{background:#555;font-family:'simsun';}
h2{text-align:center;color:#fff;}
.output{width:350px;padding:10px;margin-bottom:15px;border:2px solid #01FF02;background:#fff;margin:10px auto;}
</style>
</head>
<body>
	<h2>implode()函数</h2>
	<div class="output">原数组：<pre><?php print_r($arr);?></pre></div>
	<div class="output">原数组的键值字符串：<?php echo $key_new;?></div>
</body>
</html>