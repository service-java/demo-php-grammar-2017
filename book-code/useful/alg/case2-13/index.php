<?php
	//函数中没有return
	function getAge(){
		
	}
	//return后没有值
	function getName(){
		return;
	}
	//函数有多个返回值
	function getGrade($score){
		if($score > 60)
			return 'pass';
		else
			return 'fail';
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>函数的返回值</title>
<style> 
.tbl,td{border-collapse:collapse;height:30px;line-height:30px;font-family:'simsun';color:#f00;border:1px solid #aaa;margin:20px auto;}
.tbl th{color:#444;font-size:20px;}
.tbl,td{padding:5px;}
.tbl td:nth-child(1){font-weight:bold;color:#444;;}
</style>
</head>
 <body>
<table class="tbl">
	<tr><th colspan="2">函数的返回值</th></tr>
	<tr>
		<td>函数中没有return，调用后返回值为：</td>
		<td><?php var_dump(getAge());?></td>
	</tr>
	<tr>
		<td>return后没有值，调用后返回值为：</td>
		<td><?php var_dump(getName());?></td>
	</tr>
	<tr>
		<td>函数中有多个return，调用后返回值为：</td>
		<td><?php var_dump(getGrade(75));?></td>
	</tr>
</table>
 </body>
</html>