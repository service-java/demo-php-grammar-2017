<?php
header('Content-Type:text/html;charset=utf-8');
//载入类文件
require './Student.class.php';

$stu1 = new Student('蔡文姬');
$stu1->setGender();
var_dump($stu1);
$stu2 = new Student('曹操');
$stu2->setGender(Student::GENDER_MALE);
var_dump($stu2);