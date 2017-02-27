<?php
// 传值赋值
// $age = 12;
// $num = $age;
// $age = 100;
// echo $num . "\n"; // 12

// 引用赋值
// $num = &$age;
// echo $num . "\n"; // 100

// define函数
// define('CON', 'hello'); // 第三个参数是大小写敏感
// echo CON . "\n"; // hello
// echo constant('CON') . "\n"; // hello

// const
// const PI = 3.14159;
// echo PI . "\n"; // 3.14159

// echo false == 0;
// // echo false == 1;

// "" 和 ''的区别
// $country = 'china';
// echo "I am from $country" . "\n";
// echo 'I am from $country' . "\n";

// 给变量界定边界
// $str = "java";
// // echo "$strscript" . "";
// echo "{$str}script" . "\n";

// 输出函数
// echo "hello" , " hi", "\n"; // 用逗号也可以
// $arr = [1,4,5];
// print_r($arr);
// var_dump($arr);

// 输出结果如下
// hello hi
// Array
// (
//     [0] => 1
//     [1] => 4
//     [2] => 5
// )
// array(3) {
//   [0] =>
//   int(1)
//   [1] =>
//   int(4)
//   [2] =>
//   int(5)
// }


// echo time() . "\n"; // 1483346204
// echo date('Y-m-d H:i:s') . "\n"; // 2017-01-02 09:36:44
// echo date('Y-m-d', time()); // 2017-01-02


// 运算
// echo (-8)%7 . "\n"; // -1
// echo (8)%7 . "\n"; // 1
// $str = 'hi ';
// $str .= 'world';
// echo $str . "\n"; // hi world

// // 数据类型自动转化
// if("123abc" == 123) { echo "yes 123abc\n"; } // yes
// if("abc" == 0) { echo "yes abc\n"; } // yes
//
// // 数据类型强制转化
// var_dump((bool)-5.9); // bool(true)
// var_dump((string)12); // string(2) "12"
// var_dump((integer)'hello'); // int(0)
// var_dump((float)false); // double(0) ??
// var_dump((array)'php'); // array(1) {[0] => string(3) "php"}
// var_dump((object)2.34);
//   // class stdClass#1 (1) { public $scalar => double(2.34) }


// 数组
// $arr = [];
// $arr[] = 'hi';
// $arr[5] = '5';
// $arr[] = 'world';
// $arr['sub'] = 'sub';
// var_dump($arr);
// 输出结果
// array(4) {
//   [0] =>
//   string(2) "hi"
//   [5] =>
//   string(1) "5"
//   [6] =>
//   string(5) "world"
//   'sub' =>
//   string(3) "sub"
// }

// 数组的声名
// $info = array('id'=>1,'help',3=>'msg');
// var_dump($info);
// // array(3) {
// //   'id' =>
// //   int(1)
// //   [0] =>
// //   string(4) "help"
// //   [3] =>
// //   string(3) "msg"
// // }
// $info = array(1,2,3,4);

// // 数组遍历
// $fruit = ['apple', 'pear'];
// foreach($fruit as $key => $value) {
//   echo $key . "=>" . $value . "\n";
// }
// foreach($fruit as $value) {
//   echo $value . "\n";
// }
// // 0=>apple
// // 1=>pear
// // apple
// // pear

// 自定义函数
function add($a, $b) {
  return $a + $b;
}
// echo add(3, 4); // 7
