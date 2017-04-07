<?php
# @Author: 骆金参
# @Date:   2017-03-19T15:17:43+08:00
# @Email:  1095947440@qq.com
# @Filename: example.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T15:18:12+08:00


class classname
{
    function __construct()
    {
        echo __METHOD__,"\n";
    }
}
function funcname()
{
    echo __FUNCTION__,"\n";
}
const constname = "global";

$a = 'classname';
$obj = new $a; // classname::__construct
$b = 'funcname';
$b(); // funcname
echo constant('constname'), "\n"; // global
