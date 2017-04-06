<?php
header('Content-Type:text/html;charset=utf-8');
//载入类文件
require './Student.class.php';
//实例化
$stu = new Student('蔡文姬', 'female');
//销毁对象
unset($stu);
//$stu2 = null;//也可以销毁对象，null是其他数据亦可