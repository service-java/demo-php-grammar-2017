<?php
// 严格模式
declare(strict_types=1);

function sum(int ...$ints)
{
   return array_sum($ints);
}

print(sum(2, 3, 14));
// print(sum(2, '3', 4.1));


