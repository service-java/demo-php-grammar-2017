<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>current()</title>
<style> 
body{background:#555;font-family:'simsun';}
h2{text-align:center;color:#fff;}
.output{width:340px;height:62px;line-height:62px;padding-left:10px;margin:0 auto 15px;border:2px solid #01ff02;background:#fff;text-align:center;}
</style>
</head>
<body>
	<h2>current()</h2>
	<?php
		$arr = array('li', 'male',20);
	?>
	<div class="output">当前数组的指针指向：<?php var_dump(current($arr)); ?></div>
	<?php
		//使用for遍历数组
		for($i=0; $i<count($arr); ++$i){
			
		}
	?>	
	<div class="output">for遍历完数组后指针指向：<?php var_dump(current($arr)); ?></div>
	<?php
		//foreach遍历数组
		foreach($arr as $v){
			
		}
	?>	
	<div class="output">foreach遍历完数组后指针指向：<?php var_dump(current($arr)); ?></div>	
</body>
</html>