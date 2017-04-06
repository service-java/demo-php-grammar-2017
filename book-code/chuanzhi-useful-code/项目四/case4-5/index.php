<?php
header('Content-Type:text/html;charset=utf-8');
//载入类文件
require './Student.class.php';

$stu1 = new Student('蔡文姬', 'female');
$stu2 = $stu1;//赋值
echo $stu2->name;
echo '<br>';
$stu1->name = '曹操';//修改$stu1的属性
echo $stu2->name;//测试$stu2的属性