<?php
# @Author: 骆金参
# @Date:   2017-02-27T22:41:55+08:00
# @Email:  1095947440@qq.com
# @Filename: arr-test.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-02T23:30:18+08:00

// 数组的声名
// $info = array('id'=>1,'help',3=>'msg');
//$info = array(1,2,3,4);
// var_dump($info); hr();


// 下标不会补缺
$arr = [];
$arr[] = 'hi';
$arr[5] = '5';
$arr[] = 'world';
$arr['sub'] = 'sub';
echo $arr[5] , PHP_EOL; // 取不存在的下标会报错
var_dump($arr);
echo PHP_EOL;


// 数组遍历
foreach($arr as $key => $value) {
    echo $key . "=>" . $value . PHP_EOL;
}
echo PHP_EOL;

foreach($arr as $value) {
    echo $value . PHP_EOL;
}
echo PHP_EOL;

// 多维数组
$goods = array(
 array('name'=>'主板','price'=>'379','producing'=>'广东','num'=>3),
 array('name'=>'显卡','price'=>'799','producing'=>'上海','num'=>2),
 array('name'=>'硬盘','price'=>'589','producing'=>'北京','num'=>5)
);

foreach($goods as $values) {
    // echo $values['price'] . "\n";
    foreach($values as $v){
        echo $v . " ";
    }
    echo PHP_EOL;
}
echo PHP_EOL;


/////////////// gettype与settype
$good = ['t', 2];
// echo gettype($good) . "\n";
echo gettype($good[1]) . PHP_EOL; // integer
settype($good[1], 'string');
echo gettype($good[1]) . PHP_EOL; // string
echo PHP_EOL;
