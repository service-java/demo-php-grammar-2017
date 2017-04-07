<?php
# @Author: 骆金参
# @Date:   2017-03-19T20:58:28+08:00
# @Email:  1095947440@qq.com
# @Filename: file-test.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T21:10:40+08:00

// 要在localhost服务器下运行此文件才有效 appache
// $url = "https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/logo_white_fe6da1ec.png";
$url = "http://g.hiphotos.baidu.com/news/w%3D638/sign=9a9a770daacc7cd9fa2d37da01002104/f11f3a292df5e0feaf10e5e1556034a85fdf72c1.jpg";

$data = file_get_contents($url);
$filepath = "fresh.png";
file_put_contents($filepath, $data) or die("不能写入文件");
