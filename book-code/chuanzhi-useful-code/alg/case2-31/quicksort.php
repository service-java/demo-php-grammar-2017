<?php
//快速排序
function quickSort($list) {
	//1、判断待排序序列内元素个数，如果为0或1，则直接返回即可！（递归出口）
	$len = count($list);
	if ($len == 1 || $len == 0) {
		// echo 'A';
		return $list;
	}
	//2、选择参考元（第一个元素）
	$key = $list[0];
	//3、根据参考元，将数组分成2个部分。小于，大于。
	$small = $big = array();    //初始化两个序列
	for($i=1; $i<$len; ++$i) {
		if ($list[$i] < $key) { //比参考元小
			$small[] = $list[$i];
		} else {
			$big[] = $list[$i];
		}
	}
	//4、递归的对 小于部分，与大于部分采用相同的方案排序。（递归调用）
	$small_sort = quickSort($small);
	$big_sort = quickSort($big);
	//5、将排序好的小于参考元部分、参考元和大于参考元部分合并成一个数组并返回。
	return array_merge($small_sort, array($key), $big_sort);
}

//排序前数据
$list_old = array(33, 21, 11, 2, 1, 65, 88);
//调用函数，获取排序后数据
$list_new = quickSort($list_old);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>快速排序</title>
<style>
body{font-family:'simsun';}
h2{text-align:center;}
span{float:left;margin-top:30px;}
.before,.after{width:420px;}
.after{clear:both;}
.ball{display:block;border-radius:50%;height:40px;line-height:38px;width:40px;margin:20px 5px;text-align:center;color:#0a4376;font-weight:bolder;box-shadow:0px 0px 6px 6px #d0e8f4 inset;opacity:0.75;float:left;font-size:14px;}
  </style>
 </head>
 <body>
	<h2>快速排序</h2>

	<div class="before">
		<span>排序前：</span>
		<?php foreach($list_old as $v):?>
		<div class="ball"><?php echo $v;?></div>
		<?php endforeach;?>
	</div>
	
	<div class="after">
		<span>排序后：</span>
		<?php foreach($list_new as $v):?>
		<div class="ball"><?php echo $v;?></div>
		<?php endforeach;?>
	</div>
 </body>
</html>



