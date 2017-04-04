<?php
header('Content-Type:text/html;charset=utf-8');

function calculate($a, $b, $func){
	return $func($a, $b);
}

echo calculate(100, 200, function($a, $b){
	return $a + $b;
});  //输出结果：300