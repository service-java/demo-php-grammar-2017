<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>输出隔行换色的表格</title>
<style> 
td{border:1px solid #222;padding:5px;}
th{padding-bottom:10px;}
.tbl{border-collapse:collapse;text-align:center;margin:0 auto;}
</style>
</head>
<body>
<table class="tbl">
	<tr>
		<th colspan="2">表格隔行换色</th>
	</tr>
	<?php
		for($i=1; $i<=5; ++$i){
			if($i%2==0){
				echo '<tr><td>偶数行</td>';
			}else{
				echo '<tr bgcolor="green" ><td>奇数行</td>';
			}
			echo '<td>'.$i.'</td></tr>';
		}
	?>
</table>
 </body>
</html>