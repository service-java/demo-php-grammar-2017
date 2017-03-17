<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:17+08:00
# @Email:  1095947440@qq.com
# @Filename: showList.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T23:10:49+08:00



header('content-type:text/html;charset=utf-8');
require './MySQLDB.class.php';

$params = array(
	'user' => 'root',
	'pwd' => 'root',
	'dbname' => 'imedia'
);

$mysql = MySQLDB::getInstance($params);
$mysql2 = MySQLDB::getInstance($params);

var_dump($mysql,$mysql2);
$res = $mysql->fetchAll('select * from article');
var_dump($res);
