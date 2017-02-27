<?php
//声明编码格式
header('content-type:text/html;charset=utf-8');

//载入Employee类文件
require './Employee.class.php';

//创建 员工1 对象
$e1 = new Employee;
//为对象属性赋值
$e1->name = '张三';
$e1->age = 25;
//调用成员方法
$e1->introduce();

//创建 员工2 对象
$e2 = new Employee;
//为对象属性赋值
$e2->name = '李四';
$e2->age = 30;
//调用成员方法
$e2->introduce();
