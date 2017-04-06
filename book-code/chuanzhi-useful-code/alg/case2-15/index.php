<?php 
	//定义函数
	function sayHello($schoolname, $classname, $linkchar='LINKCHAR'){
		echo $schoolname, $linkchar, $classname, '<br>';
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>参数数量</title>
<style> 
.tbl,td{border-collapse:collapse;height:30px;line-height:30px;font-family:'simsun';color:#f00;margin:20px auto;width:700px;}
.tbl th{color:#444;font-size:28px;padding-bottom:20px;}
.tbl td{border:1px solid #aaa;padding:0 10px;}
.tbl td:nth-child(1){font-weight:bold;color:#444;width:300px;text-align:center;}
</style>
</head>
<body>
<table class="tbl">
	<tr><th colspan="2">参数数量</th></tr>
	<tr>
		<td>实参情况</td>
		<td>运行结果</td>
	</tr>
	<tr>
		<td>传递相同数量的实参</td>
		<td><?php sayHello('itcast', 'php0421', '&nbsp;'); ?></td>
	</tr>
	<tr>
		<td>传递多于形参的实参</td>
		<td><?php sayHello('itcast', 'php0421', '===', 'very good.'); ?></td>
	</tr>
	<tr>
		<td>传递实参<br>（除有默认值的形参外）</td>
		<td><?php sayHello('itcast', 'php0421'); ?></td>
	</tr>
	<tr>
		<td>传递一个实参</td>
		<td><?php sayHello('itcast'); ?></td>
	</tr>
</table>
</body>
</html>