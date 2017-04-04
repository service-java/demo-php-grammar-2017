<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>自动类型转换细节</title>
<style> 
h2{text-align:center;color:#222;}
.box{width:300px;background-color:#0032C1;margin:3px auto;font-size:18px;font-weight:bold;color:#fff;padding:20px;text-align:left;}
</style>
</head>
<body>
<h2>自动类型转换细节</h2>
<div class="box">
	<?php
		//在此处编写PHP代码
		$foo = '0';
		if(is_string($foo)){
			echo '$foo是字符串型，值为：'.$foo.'<hr>';
		}
		$foo += 2;
		if(is_int($foo)){
			echo '$foo是整型，值为：'.$foo.'<hr>';
		}
		$foo = $foo + 1.3;
		if(is_float($foo)){
			echo '$foo是浮点型，值为：'.$foo.'<hr>';
		}
		$foo = 5 + '10Number';
		if(is_int($foo)){
			echo '$foo是整数型，值为，值为：'.$foo.'<hr>';
		}
		$a = 10;
		$str = "$a";
		if(is_string($str)){
			echo '$str是字符串型，值为：'.$str.'<hr>';
		}
		if('ABC'==0){
			echo '转换结果为true<hr>';
		}
		if('ABC'==true){
			echo '转换结果为true<hr>';
		}
		if(false==0){
			echo '转换结果为true<hr>';
		}
		if(0){
			echo '转换结果为true<hr>';
		}else{
			echo '转换结果为false';
		}
	?>
</div>
</body>
</html>