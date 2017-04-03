<?php
# @Author: 骆金参
# @Date:   2017-03-17T23:44:01+08:00
# @Email:  1095947440@qq.com
# @Filename: magic-var.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T23:48:17+08:00

namespace MyProject;
header("Content_type:text/html;charset=utf-8");

echo '命名空间为："', __NAMESPACE__, '"' , PHP_EOL; // 输出 "MyProject"
echo '这是第 " '  . __LINE__ . ' " 行',    PHP_EOL;
echo '该文件位于 " '  . __FILE__ . ' " ',  PHP_EOL;
echo '该文件位于 " '  . __DIR__ . ' " ',  PHP_EOL;

function Test() {
    // echo  '函数名为：' . __FUNCTION__ ;
    echo  '函数名为：' , __METHOD__ , PHP_EOL; // 区分大小写
}
Test();

class test {
    function _print() {
        echo '类名为：'  . __CLASS__ . PHP_EOL;
        echo  '函数名为：' . __FUNCTION__ ;
    }
}
$t = new test();
$t->_print();
