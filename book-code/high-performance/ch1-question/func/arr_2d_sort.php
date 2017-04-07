<?php
# @Author: 骆金参
# @Date:   2017-03-20T22:30:56+08:00
# @Email:  1095947440@qq.com
# @Filename: arr_2D_sort.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-20T22:36:15+08:00

// 定义多维数组
$a = array(
  array("sky", "blue"),
  array("apple", "red"),
  array("tree", "green")
);

// 自定义数组比较函数，
// 按数组的第二个元素进行比较
function my_compare($a, $b) {
  if($a[1] < $b[1]) { return -1; }
  elseif($a[1] === $b[1]) { return 0;}
  else { return 1; }
}

usort($a, 'my_compare');
foreach($a as $elem) {
  echo "{$elem[0]} : {$elem[1]}\n";
}

// sky : blue
// tree : green
// apple : red
