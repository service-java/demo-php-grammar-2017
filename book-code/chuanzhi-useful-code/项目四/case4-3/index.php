<?php
header('Content-Type:text/html;charset=utf-8');
//载入类文件
require './Student.class.php';
//实例化
$stu1 = new Student('廉颇');
//输出测试
var_dump($stu1->name);
var_dump($stu1->gender);
//实例化
$stu2 = new Student('蔡文姬', 'female');
//输出测试
var_dump($stu2->name);
var_dump($stu2->gender);