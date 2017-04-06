<?php
header('Content-Type:text/html;charset=utf-8');
//载入类文件
require './Student.class.php';
//实例化
$stu = new Student;
//并测试输出
var_dump($stu);
var_dump($stu->name);
var_dump($stu->gender);
$stu->name = '小明';
echo $stu->sayHello();