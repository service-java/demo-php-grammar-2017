<?php
//声明编码格式
header('Content-type:text/html;charset=utf-8');

//载入Employee类文件
require './Employee.class.php';
//创建对象
$e1 = new Employee;

//-----以一定格式打印输出
echo '<pre>';
var_dump($e1);
echo '</pre>';
