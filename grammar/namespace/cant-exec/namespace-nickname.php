<?php
# @Author: 骆金参
# @Date:   2017-03-19T15:36:55+08:00
# @Email:  1095947440@qq.com
# @Filename: namespace-nickname.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T15:37:08+08:00


namespace foo;
use My\Full\Classname as Another;

// 下面的例子与 use My\Full\NSname as NSname 相同
use My\Full\NSname;

// 导入一个全局类
use \ArrayObject;

$obj = new namespace\Another; // 实例化 foo\Another 对象
$obj = new Another; // 实例化 My\Full\Classname　对象
NSname\subns\func(); // 调用函数 My\Full\NSname\subns\func
$a = new ArrayObject(array(1)); // 实例化 ArrayObject 对象
// 如果不使用 "use \ArrayObject" ，则实例化一个 foo\ArrayObject 对象
