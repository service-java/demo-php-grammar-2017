<?php
# @Author: 骆金参
# @Date:   2017-03-14T23:09:17+08:00
# @Email:  1095947440@qq.com
# @Filename: echo-print.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T00:01:38+08:00


$str = "Hello";
$number = 123;
printf("%s world. Day number %u",$str,$number);

function hr() {
    echo "\n----------------\n";
}

hr();

// 输出函数
echo "hello" , " hi", "\n"; // 用逗号也可以

$arr = [1,4,5];
print_r($arr);
var_dump($arr);
hr();

// 9x9乘法表
for($i = 1; $i < 10; $i++) {
   for($j = 1; $j <= $i; $j++) {
       echo $j . "X" . $i . "=" . $i * $j . " ";
   }
   echo "\n";
}
hr();


// 倒金字塔
for($i=1; $i<=5; $i++)
{
   for($j=0; $j<2*$i-1; $j++)
   {
       echo "*";
   }
   echo "\n";
}
hr();
