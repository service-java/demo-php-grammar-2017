<?php
# @Author: 骆金参
# @Date:   2017-03-19T22:32:32+08:00
# @Email:  1095947440@qq.com
# @Filename: loop-better.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T22:47:05+08:00

// 保存长度
// 使用foreach代替
// 计时

// $people = array("Peter", "Joe", "Glenn", "Cleveland");
//
// echo current($people) . "<br>";
// echo next($people) . "<br>";
// echo reset($people);

$items = array_fill(0, 10000, '123456789');
$start = microtime();
reset($items); // 把指针回复到开始
foreach($items as $item)
{
  $x = $item;
}
echo microtime() - $start; // 0.001413
echo "\n";

reset($items);
$start = microtime();
$i = 0;
while($i < 10000) {
  $x = $items[$i];
  $i++;
}
echo microtime() - $start; // 0.004464
echo "\n";

reset($items);
$start = microtime();
$i = 0;
for($i=0;$i<10000;$i++) {
  $x = $items[$i];
}
echo microtime() - $start; // 0.005711
