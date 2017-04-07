<?php
# @Author: 骆金参
# @Date:   2017-03-20T19:48:53+08:00
# @Email:  1095947440@qq.com
# @Filename: anonymous_func_closure.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-20T20:09:11+08:00

// before PHP5.3
// 显式声名
// 貌似报错
// $x = 3;
// $func = create_function($z) { return $z *= 2; };
// echo $func($x);

// after PHP 5.3
$x = 3;
$func = function() use(&$x) { $x *= 2; };
$func();
echo $x,"\n"; // 6

$foo = create_function('$x', 'return $x*$x;');
$bar = create_function("\$x", "return \$x*\$x;");
echo $bar(6) , "\n"; // 36
