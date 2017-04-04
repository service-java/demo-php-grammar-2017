<?php
//冒泡排序
function bubbleSort($list) {
	//外层循环控制需要比较的轮数
	for ($i=1, $len=count($list); $i<$len; ++$i) {
		//内层循环控制参与比较的元素
		//以前一个元素为标准
		for ($j=0; $j<$len-$i; ++$j) {
			//比较索引值为：$j与$j+1的元素比较
			if ($list[$j] > $list[$j+1]) {
				//交换
				$tmp = $list[$j];
				$list[$j] = $list[$j+1];
				$list[$j+1] = $tmp;
			}
		}
	}
	return $list;
}

//排序前数据
$list_old = array(35, 23, 14, 89, 3, 67, 23);
//调用函数，获取排序后数据
$list_new = bubbleSort($list_old);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>冒泡排序</title>
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
	<h2>冒泡排序</h2>

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