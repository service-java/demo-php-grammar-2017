<?php
# @Author: 骆金参
# @Date:   2017-03-18T00:33:48+08:00
# @Email:  1095947440@qq.com
# @Filename: scope.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-18T01:27:45+08:00

$x=5; // 全局变量

// function myTest() {
//     $y = 10; // 局部变量
//     echo "变量 x 为: $x"; // Undefined variable: x
//     echo "内: 变量 y 为: $y";
// }
//
// myTest();
// echo "变量 x 为: $x";
// echo "外: 变量 y 为: $y"; // Undefined variable: y

// global==========
$x=5;
$y=10;

function myTest2() {
  global $x, $y; // 在函数内调用函数外定义的全局变量
  $y = $x + $y;

  // $GLOBALS['y']=$GLOBALS['x']+$GLOBALS['y'];
}

myTest2();
echo $y,"\n"; // 输出 15

function myTest3() {
  static $x=0;
  echo $x,"\n";
  $x++;
}

myTest3();
myTest3();
myTest3();
