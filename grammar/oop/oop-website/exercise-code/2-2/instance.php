<?php
//声明编码格式
header('content-type:text/html;charset=utf-8');

//载入类文件
require './Employee.class.php';
require './NormalEmployee.class.php';
require './ManageEmployee.class.php';

//创建 员工1 对象
$e1 = new NormalEmployee('dogface',24);
//创建 员工2 对象
$e2 = new ManageEmployee('leader',38);

//调用成员方法
$e1->introduce();
$e2->introduce();
