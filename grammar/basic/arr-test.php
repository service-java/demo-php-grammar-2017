<?php
/**
 * Created by PhpStorm.
 * User: Luo_0412
 * Date: 2017/2/27
 * Time: 22:41
 */

require_once ("lib.php");
hr();

// 数组
$arr = [];
$arr[] = 'hi';
$arr[5] = '5';
$arr[] = 'world';
$arr['sub'] = 'sub';
var_dump($arr);
hr();


// 数组的声名
$info = array('id'=>1,'help',3=>'msg');
//$info = array(1,2,3,4);
var_dump($info);
hr();


// 数组遍历
$fruit = ['apple', 'pear'];
foreach($fruit as $key => $value) {
    echo $key . "=>" . $value . "\n";
}
hr();

foreach($fruit as $value) {
    echo $value . "\n";
}
hr();

