<?php
# @Author: 骆金参
# @Date:   2017-03-19T21:25:37+08:00
# @Email:  1095947440@qq.com
# @Filename: file_remote_pic_read.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T21:28:29+08:00


$handle = fopen("http://g.hiphotos.baidu.com/news/w%3D638/sign=9a9a770daacc7cd9fa2d37da01002104/f11f3a292df5e0feaf10e5e1556034a85fdf72c1.jpg", "r");
$contents = '';
while(!feof($handle)) {
  $contents = $contents.fread($handle, 8192);
}
fclose($handle);

var_dump($contents);
