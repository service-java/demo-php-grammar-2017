<?php

//分数数组
$score_array = array('85','92','73','96','100','89','67','81','95','88');

//对数组进行升序排序
sort($score_array);

//取出最小值
$min = array_shift($score_array);

//取出最大值
$max = array_pop($score_array);

//计算数组中元素的个数
$num = count($score_array);

//计算数组中所有值的和
$sum = array_sum($score_array);

//计算歌唱比赛的平均值
$avg = round($sum/($num),1);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>歌唱比赛评分</title>
<style>
.box{width:500px;height:358px;background:url('./image/back.jpg');margin:10px auto;}
.sing{*border-collapse:separate;/* IE7 and lower */border-spacing:2px;margin:0 auto;padding-top:130px;width:300px;}
.sing tr,td{border:solid #ccc 1px;padding:5px;text-align:center;background-color:#fff;opacity:0.9;}
</style>
</head>
<body>
<div class="box">
	<table class="sing">
		<tr>
			<td>最低分</td>
			<td><?php echo $min; ?></td>
		</tr>
		<tr>
			<td>最高分</td>
			<td><?php echo $max; ?></td>
		</tr>
		<tr>
			<td>总分</td>
			<td><?php echo $sum; ?></td>
		</tr>
		<tr>
			<td>平均分</td>
			<td><?php echo $avg; ?></td>
		</tr>
	</table>
</div>
</body>
</html>