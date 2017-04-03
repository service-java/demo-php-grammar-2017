<?php
# @Author: 骆金参
# @Date:   2017-03-18T01:16:34+08:00
# @Email:  1095947440@qq.com
# @Filename: operator.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-18T01:19:33+08:00


// var_dump(intdiv(10, 3));

// 如果 $_GET['user'] 不存在返回 'nobody'，否则返回 $_GET['user'] 的值
// $username = $_GET['user'] ?? 'nobody';

// 类似的三元运算符
// $username = isset($_GET['user']) ? $_GET['user'] : 'nobody';

echo "hi", PHP_EOL; // PHP_EOL 是一个换行符，兼容更大平台。
echo "hi";

// 组合比较符
// 整型
echo 1 <=> 1; // 0
echo 1 <=> 2; // -1
echo 2 <=> 1; // 1

// 浮点型
echo 1.5 <=> 1.5; // 0
echo 1.5 <=> 2.5; // -1
echo 2.5 <=> 1.5; // 1

// 字符串
echo "a" <=> "a"; // 0
echo "a" <=> "b"; // -1
echo "b" <=> "a"; // 1
