<?php
	//转换字符串函数
	function change_str($str){
		$arr = explode('_',$str);
		$arr = array_map('ucfirst',$arr);
		return implode('',$arr);
	}
	//字符串转换前
	$str1_old = 'open_door';
	$str2_old = 'make_by_id';
	//调用转换字符串函数后
	$str1_new = change_str($str1_old);
	$str2_new = change_str($str2_old);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>explode()函数</title>
<style> 
body{background:#555;font-family:'simsun';}
h2{text-align:center;color:#fff;}
.box{width:350px;height:100px;line-height:50px;padding-left:20px;border:2px solid #01FF02;background:#fff;margin:0 auto;}
</style>
</head>
<body>
	<h2>explode()函数</h2>
	<div class="box">
		转换前字符串为：<?php echo $str1_old.'，'.$str2_old; ?><br />
		转换后字符串为：<?php echo $str1_new.'，'.$str2_new; ?>
	</div>		
</body>
</html>