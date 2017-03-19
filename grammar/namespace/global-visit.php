<?php
# @Author: 骆金参
# @Date:   2017-03-19T15:14:12+08:00
# @Email:  1095947440@qq.com
# @Filename: global-visit.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T15:15:42+08:00


namespace Foo;

function strlen() {}
const INI_ALL = 3;
class Exception {}

$a = \strlen('hi'); // 调用全局函数strlen
$b = \INI_ALL; // 访问全局常量 INI_ALL
$c = new \Exception('error'); // 实例化全局类 Exception

echo $a,"\n",$b,"\n",$c,"\n";

// 输出结果
// 2
// 7
// exception 'Exception' with message 'error' in C:\wamp\www\hello-php\grammar\namespace\global-visit.php:18
// Stack trace:
// #0 {main}
