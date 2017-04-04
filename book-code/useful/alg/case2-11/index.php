<?php

//用于保存结果
$data = array();

/*第一种方式*/
//假设：100只鸡都为母鸡
for($mj=1;$mj<=100;++$mj){
	//假设：100只鸡都为公鸡
    for($gj=1;$gj<=100;++$gj){
		//假设：100只鸡都为小鸡
        for($xj=1;$xj<=100;++$xj){
			//根据条件依次进行判断
            if(($gj+$mj+$xj == 100) && ($gj*5+$mj*3+$xj/3==100)){
				$data[] = array(
					'gj' =>$gj,
					'mj' =>$mj,
					'xj' =>$xj
				);			
            }
        }
    }
}

/*第二种方式*/
/*
//根据条件可得母鸡最多为33只
for($mj=1;$mj<=33;++$mj){
	//根据条件可得公鸡最多为20只
    for($gj=1;$gj<=20;++$gj){
		//计算：小鸡 = 100 - 母鸡数量 - 公鸡数量
        $xj=100-$mj-$gj;
		//根据钱数进行判断
        if($gj*5+$mj*3+$xj/3==100){
			$data[] = array(
				'gj' =>$gj,
				'mj' =>$mj,
				'xj' =>$xj
			);	
        }
    }
}
*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>百钱白鸡</title>
<style>
.tbl{border-collapse:collapse;width:450px;text-align:center;margin:0 auto;border:1px solid #174464;}
.tbl tr:nth-child(1){font-weight:bold;background:#174464;color:#fff;height:30px;font-size:18px;}
</style>
</head>
<body>
<table class="tbl">
	<tr>
		<td>公鸡数量（个）</td>
		<td>母鸡数量（个）</td>
		<td>小鸡数量（个）</td>
	</tr>
	<?php foreach($data as $v):?>
	<tr>
		<td><img src='./image/gj.jpg'><?php echo $v['gj']; ?></td>
		<td><img src='./image/mj.jpg'><?php echo $v['mj']; ?></td>
		<td><img src='./image/xj.jpg'><?php echo $v['xj']; ?></td>
	</tr>
	<?php endforeach;?>
</table>
</body>
</html>