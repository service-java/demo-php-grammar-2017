<?php
# @Author: 骆金参
# @Date:   2017-03-06T14:19:14+08:00
# @Email:  1095947440@qq.com
# @Filename: force.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-14T22:18:01+08:00


// 严格模式
declare(strict_types=1);

function sum(int ...$ints)
{
   return array_sum($ints);
}

print(sum(2, 3, 14));
// print(sum(2, '3', 4.1));
