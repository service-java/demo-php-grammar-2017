<?php
/**
 * Created by PhpStorm.
 * User: Luo_0412
 * Date: 2017/2/27
 * Time: 22:32
 */
require_once("lib.php");

// 随机数
$keys = rand(1, 16); // 1~16
echo "随机数 " . $keys . "\n";
hr();

// 在一定范围内产生若干个随机数
$keys = array_rand(range(1, 33), 6); //
shuffle($keys);

foreach ($keys as $v) {
    echo $v . "\n";
}

hr();