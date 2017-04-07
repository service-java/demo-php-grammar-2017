<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:17+08:00
# @Email:  1095947440@qq.com
# @Filename: student_object.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-18T00:00:23+08:00



header('content-type:text/html;charset=utf-8'); //声明文件解析的编码格式
require 'student.class.php'; //引入 student 类文件

//实例化 student 对象，并赋值给$student
$student = new student;
$student2 = new student;

$student->name = '小明';
$student->student_id = '201502110178';
$student->age = 18;

$student2->name = '小红';
$student2->student_id = '201502110153';
$student2->age = 17;

var_dump($student, $student2); //显示变量详细信息
$student2->introduce(); // 注意注销顺序
