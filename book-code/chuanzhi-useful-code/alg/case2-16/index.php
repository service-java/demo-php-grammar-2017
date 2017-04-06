<?php
function king($n,$m){
	$monkey = range(1,$n);
	$i = 0;
	while(count($monkey) > 1){
		++$i;
		//一个个出列最前面的猴子
		$head = array_shift($monkey);
		if($i % $m != 0){
			//如果不是m的倍数，则把该猴子返回尾部，否则就抛掉，也就是出列了
			array_push($monkey,$head);
		}
	}
	//剩下的最后一个就是大王
	return array(
		'total'=>$n,
		'kick'=>$m,
		'king'=>$monkey[0]
	);
}

//调用函数，取得数组结果
$data = king(10,7);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>找猴王游戏</title>
<style>
.left{background:url('./image/monkey.jpg');width:140px;height:157px;float:left;}
.right{float:left;margin:12px;}
.tbl{height:30px;line-height:30px;font-family:'华文中宋';color:#f00;}
.tbl th{color:#444;font-size:20px;}
.tbl td:nth-child(1){font-weight:bold;color:#444;}
</style>
</head>
<body>
<div class="left"></div>
<div class="right">
	<table class="tbl">
		<tr>
			<th colspan="2">找猴王游戏</th>
		</tr>
		<tr>
			<td>猴子总数：</td>
			<td><?php echo $data['total']; ?></td>
		</tr>
		<tr>
			<td>踢出第m只猴子：</td>
			<td><?php echo $data['kick']; ?></td>
		</tr>
		<tr>
			<td>猴王编号：</td>
			<td><?php echo $data['king']; ?></td>
		</tr>
	</table>
</div>
</body>
</html>