<?php
//声明编码格式
header('content-type:text/html;charset=utf-8');

//载入Employee类文件
require './Employee.class.php';

//创建 员工1 对象
$e1 = new Employee('张三',25);
//创建 员工2 对象
$e2 = new Employee('李四',30);

//调用成员方法
$e1->introduce();
$e2->introduce();
