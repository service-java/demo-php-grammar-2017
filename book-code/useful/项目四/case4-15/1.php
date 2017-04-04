<?php
header('Content-Type:text/html;charset=utf-8');

$sum = function($a, $b){
	return $a + $b;
};

echo $sum(100, 200);  //输出结果：300