<?php
# @Author: 骆金参
# @Date:   2017-03-19T15:27:33+08:00
# @Email:  1095947440@qq.com
# @Filename: namespace-method-test.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T15:28:40+08:00


namespace MyProject;

class hello {

}

function get($classname)
{
    $a = __NAMESPACE__ . '\\' . $classname;
    return new $a;
}

var_dump(get("hello"));
