<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>函数的参数</title>
<style> 
h2{text-align:center;color:#222;}
.box{width:380px;border:2px dotted #0032C1;margin:3px auto;font-size:18px;font-weight:bold;padding:10px;line-height:35px;}
</style>
</head>
<body>
<h2>函数的参数</h2>
<div class="box">
	<?php
		//把不定数量的字符串参数连接成一个字符串并返回
		function concat(){
			$arr = func_get_args();
			//使用数组遍历方法
			$str = '';
			foreach($arr as $v){
				$str .= $v;
			}
			return $str;
		}
		echo '调用的函数：concat(\'a\', true, -3.56)'.'<br />';
		echo '返回的实参字符串：'.concat('a', true, -3.56);
	?>
</div>
</body>
</html>