<?php
# @Author: 骆金参
# @Date:   2017-03-20T19:40:05+08:00
# @Email:  1095947440@qq.com
# @Filename: php_anonymous_func.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-20T19:48:14+08:00

// 匿名函数
$greeting = function($name) {
  echo "Hello ",$name,PHP_EOL;
};

$greeting("PHP");
// $greeting("world");

// 使用array_map
// 第二个参数是一个数组
// 返回用户自定义函数之后的数组
$name = ["luojs"]; // should be array
function hello($name) {
  echo "Hello ",$name,PHP_EOL;
}
array_map('hello', $name);

// array_map(function() {
//   echo "Hello ",$name,PHP_EOL;
// }, $name);
