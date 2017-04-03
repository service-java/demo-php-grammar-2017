<?php
# @Author: 骆金参
# @Date:   2017-03-14T23:09:17+08:00
# @Email:  1095947440@qq.com
# @Filename: echo-print.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T00:01:38+08:00

function hr() {
    echo "\n----------------\n";
}

function getFileExt($path) {
    $ext = substr($path, strrpos($path, '.') + 1); // 偏移量
    return $ext;
}

function gradeLevel($score) {
    if (is_int($score) || is_float($score)) { // 判断score类型
        if ($score >= 90 && $score <= 100) {
            $str = 'A级';
        } elseif ($score >= 80 && $score < 90) {
            $str = 'B级';
        } elseif ($score >= 70 && $score < 80) {
            $str = 'C级';
        } elseif ($score >= 60 && $score < 70) {
            $str = 'D级';
        } elseif ($score >= 0 && $score < 60) {
            $str = 'E级';
        } else {
            $str = '学生成绩范围必须在0~100之间！';
        }
    } else {
        $str = '输入的学生成绩不是数值！';
    }
    return $str;
}

function isLeapYearHelper($year) {
    return (($year % 4 == 0) && ($year % 100 != 0) || ($year % 400 == 0));
}

function isLeapYear($year) {
    $str = $year . "";
    if(isLeapYearHelper($year) == false) {
        $str .= "不是";
    } else {
        $str .= "是";
    }
    $str .= "闰年\n";
    echo $str;
}


// 类C的printf输出====================
// $str = "Hello";
// $num = 123;
// printf("%s world. Day number %u",$str,$num);
// hr();

// 常规输出======================
// echo "hello" , " hi", "\n"; // 用逗号
// $arr = [1,4,5];
// print_r($arr);
// var_dump($arr);
// hr();

// 9x9乘法表====================
// for($i = 1; $i < 10; $i++) {
//    for($j = 1; $j <= $i; $j++) {
//        echo $j . "X" . $i . "=" . $i * $j . " ";
//    }
//    echo "\n";
// }
// hr();


// 倒金字塔
// for($i=1; $i<=5; $i++) {
//    for($j=0; $j<2*$i-1; $j++) {
//        echo "*";
//    }
//    echo "\n";
// }
// hr();

$height = 3;

// 倒金字塔
// 几次试错慢慢成功
// for($i=$height; $i>0; $i--) {
//   for($j=$height-$i; $j>0; $j--) {
//     echo " ";
//   }
//   for($k=2*$i-1; $k>0; $k--) {
//     echo "*";
//   }
//   echo "\n";
// }


// 显示系统信息
// echo "当前PHP版本号：" .PHP_VERSION ."\n";
// echo "操作系统的类型:" .PHP_OS ."\n";
// echo "当前服务器时间:" .date('Y-m-d H:i:s');
// hr();

// 获取文件后缀
// $path = 'C:\images\apple.jpg';
// $ext = getFileExt($path);
// echo "文件路径：$path" ."\n" . "文件后缀：$ext";
// hr();

// 评分等级
// $name = '小明';
// $score = 100;
// print($name . "的成绩等级  ".gradeLevel($score));
// hr();

// 处理
$name = urlencode("A&B C"); // url + encode
echo $name . "\n"; // A%26B+C
hr();


//// 判断闰年
isLeapYear(2012);
hr();


// 给变量界定边界
// $str = "java";
// //echo "$str script";
// echo "{$str}script";
// hr();

// define函数
// define('CON', 'hello'); // 第三个参数是大小写敏感
// echo CON . "\n"; // hello
// echo constant('CON') . "\n"; // hello
// const PI = 3.14159;
// echo PI . "\n"; // 3.14159
// hr();


// echo false == 0;
echo true == 0; // 没有输出
if("123abc" == 123) { echo "yes 123abc\n"; } // yes
if("abc" == 0) { echo "yes abc\n"; } // yes
hr();


// // 数据类型强制转化
// var_dump((bool)-5.9); // bool(true)
// var_dump((string)12); // string(2) "12"
// var_dump((integer)'hello'); // int(0)
// var_dump((float)false); // double(0) ??
// var_dump((array)'php'); // array(1) {[0] => string(3) "php"}
// var_dump((object)2.34);
//   // class stdClass#1 (1) { public $scalar => double(2.34) }
