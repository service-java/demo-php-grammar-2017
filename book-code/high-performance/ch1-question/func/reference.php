<?php
# @Author: 骆金参
# @Date:   2017-03-20T18:38:53+08:00
# @Email:  1095947440@qq.com
# @Filename: reference.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-20T18:44:50+08:00

// 使用引用传递参数
// & 是 使它能够感知函数背部对它的变更
function build_row(&$text) {
  $text = "hello";
}

$t = '测试数据';
build_row($t);
echo $t;
