<?php 
	//手机号
	$tel = '15811095976';
	//使用*代替手机号的位数
	$len = 4;
	//获取“****”字符串
	$replace = str_repeat('*',$len);
	//使用“****”代替电话号中从第4开始的4位数字“1109”
	$tel_new = substr_replace($tel,$replace,3,4); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>str_repeat()函数</title>
<style> 
body{font-family:'simsun';}
h2{text-align:center;color:#333;}
.box{width:240px;padding:20px;border:2px dotted #222;background:#f7fcfc;margin:0px auto;line-height:40px;color:#0066b3;}
</style>
</head>
<body>
	<h2>str_repeat()函数</h2>
	<div class="box">
		☏ 原电话号：<?php echo $tel; ?> <br />
		☏ 现电话号：<?php echo $tel_new; ?>
	</div>
</body>
</html>