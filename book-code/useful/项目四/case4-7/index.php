<?php
header('Content-Type:text/html;charset=utf-8');
//载入类文件
require './Student.class.php';

$stu1 = new Student('蔡文姬', 'female');
$stu2 = new Student('曹操', 'male');
$stu3 = new Student('甄姬', 'female');
echo '当前学生为：', Student::getCounter() , '名学生<br>';
$stu4 = clone $stu3;
unset($stu1);
unset($stu2);
echo '当前学生为：', Student::getCounter() , '名学生<br>'; 