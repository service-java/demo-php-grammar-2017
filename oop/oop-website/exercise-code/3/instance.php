<?php
//声明编码格式
header('content-type:text/html;charset=utf-8');

//载入类文件
require './Employee.class.php';
require './NormalEmployee.class.php';
require './ManageEmployee.class.php';

 //创建普通员工类对象
 $e1 = new NormalEmployee();
 //为对象属性赋值
$e1->_name = 'dogface';
$e1->_age = 24;

//创建管理层员工类对象
$e2 = new ManageEmployee();
//为对象属性赋值
$e2->_name = 'leader';
$e2->_age = 38;

$e1->introduce();
$e2->introduce();
