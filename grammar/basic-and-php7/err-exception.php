<?php
# @Author: 骆金参
# @Date:   2017-04-03T01:29:46+08:00
# @Email:  1095947440@qq.com
# @Filename: err-exception.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T01:33:08+08:00

// // 错误处理函数
// function customError($errno, $errstr) {
// 	echo "<b>Error:</b> [$errno] $errstr";
// }
// set_error_handler("customError"); // 设置错误处理函数
//
//
// // 触发错误
// echo($test); // <b>Error:</b> [8] Undefined variable: test



function customError($errno, $errstr) {
	echo "<b>Error:</b> [$errno] $errstr<br>";
	echo "脚本结束";
	die();
}

set_error_handler("customError",E_USER_WARNING);

// 触发错误
$test=2;
if ($test>1) {
	trigger_error("变量值必须小于等于 1", E_USER_WARNING);
}
