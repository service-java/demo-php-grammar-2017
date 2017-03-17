<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:17+08:00
# @Email:  1095947440@qq.com
# @Filename: init.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T23:08:00+08:00


header('content-type:text/html;charset=utf-8');

/**
 * method1
 * 自动加载函数
 */
// function __autoload($className){
// 	require "./$className.class.php";
// }

/**
 * method2
 * 用户自定义加载函数
 * @param string $className 类名
 */
function user_autoload($className){
	require "./$className.class.php";
}

spl_autoload_register('user_autoload'); //注册用户自定义加载函数
