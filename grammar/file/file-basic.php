<?php
# @Author: 骆金参
# @Date:   2017-03-19T16:13:16+08:00
# @Email:  1095947440@qq.com
# @Filename: file-basic.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T16:13:32+08:00


$file = fopen("welcome.txt","r") or exit("Unable to open file!");
var_dump($file);

// 检查是否到达文件尾
// if (feof($file)) echo "文件结尾";

$file = fopen("welcome.txt", "r") or exit("无法打开文件!");
// 读取文件每一行，直到文件结尾
while(!feof($file))
{
    echo fgets($file). "<br>";
}
fclose($file);
