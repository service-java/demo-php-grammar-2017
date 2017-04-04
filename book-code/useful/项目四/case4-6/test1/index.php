<?php
header('Content-Type:text/html;charset=utf-8');
//载入类文件
require './Student.class.php';

$stu1 = new Student('蔡文姬', 'female');
$stu2 = clone $stu1;
var_dump($stu1, $stu2);