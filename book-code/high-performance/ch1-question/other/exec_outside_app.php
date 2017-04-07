<?php
# @Author: 骆金参
# @Date:   2017-03-20T18:27:04+08:00
# @Email:  1095947440@qq.com
# @Filename: exec_outside_app.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-20T18:31:08+08:00

// header('Content-Type:text/html;charset=utf-8');
// 执行外部命令
$out = `dir e:`; // `ls -al`
// echo $out;

// shell_exec()实现
$out = shell_exec("dir");
echo $out;
