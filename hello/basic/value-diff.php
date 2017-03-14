<?php
/**
 * 引用赋值与传值赋值
 * Created by PhpStorm.
 * User: Luo_0412
 * Date: 2017/2/27
 * Time: 22:16
 */


// 传值赋值
$age = 12;
$num = $age;
$age = 100;
echo $num . "\n"; // 12
hr();

// 引用赋值
$num = &$age;
echo $num . "\n"; // 100
hr();
