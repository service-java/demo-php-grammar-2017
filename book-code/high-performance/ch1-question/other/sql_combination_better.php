<?php
# @Author: 骆金参
# @Date:   2017-03-19T20:17:03+08:00
# @Email:  1095947440@qq.com
# @Filename: sql_combination_better.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-20T20:25:16+08:00

// 本示例
// 循环里执行$sql
// 可以直接处理这个sql语句来提高效率
$user_ids = array(101200, 101201, 101202, 101203);

// // implode()第二个参数错误
$user_ids_str = "'" . implode(",", $user_ids) . "'";
                    // 使用 , 连接它们 最后输出成字符串
print_r($user_ids);
echo $user_ids_str;

// // 变量 $user_id 未申明
// $sql = "SELECT * FROM `users` WHERE `user_id` = $user_id";
