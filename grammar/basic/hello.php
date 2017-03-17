<?php
/**
 * Created by PhpStorm.
 * User: Luo_0412
 * Date: 2017/2/27
 * Time: 22:08
 */

require_once("lib.php");
hr();

// 显示系统信息
echo "当前PHP版本号：" .PHP_VERSION ."\n";
echo "操作系统的类型:" .PHP_OS ."\n";
echo "当前服务器时间:" .date('Y-m-d H:i:s');
hr();

// 获取文件后缀
$path = 'C:\images\apple.jpg';
$ext = getFileExt($path);
echo "文件路径：$path" ."\n" . "文件后缀：$ext";
hr();

// 评分等级
$name = '小明';
$score = 100;
$str = '';

print($name . "的成绩等级  ".gradeLevel($score));
hr();


// 处理
$name = isset($_GET['name']) ? $_GET['name'] : "";
echo $name;
$name = urlencode("A&B C");
echo $name . "\n"; // A%26B+C
hr();


// 加法
echo "加法演示 " . add(3, 7);
hr();


//// 判断闰年
isLeapYear(2012);
hr();


// "" 和 ''的区别
$country = 'china';
echo "I am from $country" . "\n";
echo 'I am from $country' . "\n";
hr();

// 给变量界定边界
$str = "java";
//echo "$str script";
echo "{$str}script";
hr();

// define函数
define('CON', 'hello'); // 第三个参数是大小写敏感
echo CON . "\n"; // hello
echo constant('CON') . "\n"; // hello

// const
const PI = 3.14159;
echo PI . "\n"; // 3.14159
hr();


//echo false == 0;
echo false == 1;
hr();

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