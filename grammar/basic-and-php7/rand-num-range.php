<?php
/**
 * Created by PhpStorm.
 * User: Luo_0412
 * Date: 2017/2/27
 * Time: 22:32
 */

// 随机数
$keys = rand(1, 16); // 1~16 可以取到16
echo "随机数 " . $keys . PHP_EOL;

// 在一定范围内产生若干个随机数
$keys = array_rand(range(1, 33), 6); // 在1-33中取6个数
shuffle($keys);

foreach ($keys as $v) {
    echo $v . PHP_EOL;
}
