<?php

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


// 数组定义
// $good = array('name'=>'主板');
$good = ['t', 'u'];

// gettype与settype
// echo gettype($good) . "\n";
// echo $good[0] . "\n";

// $goo = 1;
// echo gettype($goo) . "\n";
// settype($goo, 'string');
// echo gettype($goo) . "\n";
