<?php
# @Author: 骆金参
# @Date:   2017-02-27T22:41:55+08:00
# @Email:  1095947440@qq.com
# @Filename: arr-test.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-18T00:21:45+08:00

function hr($value='') {
  echo "\n--------\n";
}
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

// 数组定义
$goods = array(
 array('name'=>'主板','price'=>'379','producing'=>'广东','num'=>3),
 array('name'=>'显卡','price'=>'799','producing'=>'上海','num'=>2),
 array('name'=>'硬盘','price'=>'589','producing'=>'北京','num'=>5)
);

foreach($goods as $values) {
    echo $values['price'] . "\n";
    foreach($values as $v){
        echo $v . " ";
    }
    echo "\n";
}

// gettype与settype
// 数组定义
// $good = array('name'=>'主板');
$good = ['t', 'u'];
var_dump($good);


echo gettype($good) . "\n";
echo $good[0] . "\n";

$goo = 1;
echo gettype($goo) . "\n";
settype($goo, 'string');
echo gettype($goo) . "\n";
