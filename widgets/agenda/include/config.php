<?php
$host="localhost";
$user="root";
$pass="root";
$database="test";
$timezone="Asia/Shanghai";

$conn=mysql_connect($host,$user,$pass);
mysql_select_db($database,$conn);
mysql_query("SET names UTF8");

header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone); //北京时间
