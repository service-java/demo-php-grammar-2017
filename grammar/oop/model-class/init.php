<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:17+08:00
# @Email:  1095947440@qq.com
# @Filename: init.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T23:17:00+08:00


//声明文件解析的编码格式
header('content-type:text/html;charset=utf-8');
//数据库配置
$dbConfig = array(
    'user' => 'root',
    'pwd' => 'root',
    'dbname' => 'itcast'
);
//使用__autoload()启动自动加载
function __autoload($className) {
    require "./library/$className.class.php";
}
//定义model方法用来实例化模型类
function model($tableName) {
    $model = $tableName . 'Model';
    return new $model($tableName);
}
