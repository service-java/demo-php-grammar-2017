<?php

//声明文件解析的编码格式
header('content-type:text/html;charset=utf-8');
require './public_function.php';

//初始化数据库
dbInit();

//获取要编辑的员工的id
$e_id = isset($_GET['e_id']) ? intval($_GET['e_id']) : 0;

//准备SQL语句
$sql = "delete from emp_info where `e_id` = $e_id";

if($res = query($sql)){
    header("Location: ./showList.php");
    die;
} else {
    die('员工信息删除失败');
}









?>