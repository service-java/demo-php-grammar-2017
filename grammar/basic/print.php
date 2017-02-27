<?php
/**
 * Created by PhpStorm.
 * User: Luo_0412
 * Date: 2017/2/27
 * Time: 22:36
 */

require_once "lib.php";
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