<?php
// 插入法排序
function insertSort($arr){
	$num = count($arr);
	// 遍历数组
	for ($i = 1;$i < $num; $i++) {
		// 获得当前值
		$iTemp = $arr[$i];
		// 获得当前值的前一个位置
		$iPos = $i - 1;
		// 如果当前值小于前一个值切未到数组开始位置
		while (($iPos >= 0) && ($iTemp < $arr[$iPos])) {
			// 把前一个的值往后放一位
			$arr[$iPos + 1] = $arr[$iPos];
			// 位置递减
			$iPos--;
		}
		$arr[$iPos+1] = $iTemp;
	}
	return $arr;
}

//排序前数据
$list_old = array(33, 21, 11, 88, 2, 65, 20);
//调用函数，获取排序后数据
$list_new = insertSort($list_old);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>插入排序</title>
<style>
body{font-family:'simsun';}
h2{text-align:center;}
span{float:left;margin-top:30px;}
.before,.after{width:420px;}
.after{clear:both;}
.ball{display:block;border-radius:50%;height:40px;line-height:38px;width:40px;margin:20px 5px;text-align:center;color:#0A4376;font-weight:bolder;box-shadow:0px 0px 6px 6px #d0e8f4 inset;opacity:0.75;float:left;font-size:14px;}
</style>
</head>
<body>
	<h2>插入排序</h2>

	<div class="before">
		<span>排序前：</span>
		<?php foreach($list_old as $v): ?>
		<div class="ball"><?php echo $v; ?></div>
		<?php endforeach; ?>
	</div>
	
	<div class="after">
		<span>排序后：</span>
		<?php foreach($list_new as $v): ?>
		<div class="ball"><?php echo $v; ?></div>
		<?php endforeach; ?>
	</div>
</body>
</html>