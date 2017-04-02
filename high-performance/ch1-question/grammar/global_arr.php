<?php
# @Author: 骆金参
# @Date:   2017-03-20T18:02:08+08:00
# @Email:  1095947440@qq.com
# @Filename: global_arr.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-20T18:05:03+08:00


$var1 = 1;
function test()
{
  unset($GLOBALS['var1']);
}

function test2()
{
  global $var1;
  unset($var1);
}

// test(); // Undefined variable
test2();   // 1

echo $var1;
