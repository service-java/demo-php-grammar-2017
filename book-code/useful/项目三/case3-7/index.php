<?php
header('Content-Type:text/html;charset=utf-8');
$str = 'na12sicmea92xisax3';
//匹配一个两位的数字
$reg = '/[0-9][0-9]/';
preg_match($reg, $str, $arr);
echo '使用preg_match匹配前：'.$str.'<br />';
echo '使用preg_match匹配后：';
echo '<pre>';
var_dump($arr);
echo '</pre>';