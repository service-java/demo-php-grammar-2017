<?php
header('Content-Type:text/html;charset=utf-8');
/*
 * 利用正则表达式 截取UTF-8中文字符串
 * @param string $str 要处理的字符串
 * @param int $start  从哪个位置开始截取
 * @param int $length 要截取字符串的个数
 * @return string     截取后的字符串
 */
function substr_utf8($str,$start,$length){ 
	return implode('', array_slice(preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY), $start, $length));
}
$str = '传智播客PHP学院'; 
$res = substr_utf8($str,2,6); 
echo $res; 