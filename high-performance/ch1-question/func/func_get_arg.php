<?php
# @Author: 骆金参
# @Date:   2017-03-20T18:19:50+08:00
# @Email:  1095947440@qq.com
# @Filename: func_get_arg.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-20T18:24:30+08:00

function getUserInfo() {
  $args = func_get_args();
  $first = $args[0];
  $second = $args[1];
  $third = func_get_arg(2); // 注意不是arg
  var_dump($first,$second,$third);
}

getUserInfo("hello", " PHP", " World");
