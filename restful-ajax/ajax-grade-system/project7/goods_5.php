<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:24:31+08:00
# @Email:  1095947440@qq.com
# @Filename: goods_5.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-15T14:16:47+08:00


 header('Content-Type:text/html;charset=utf-8');
//载入富文本过滤器
require './HTMLPurifier/HTMLPurifier.standalone.php';
//实例化过滤器
$Purifier = new HTMLPurifier();

//获取提交的数据
$html = isset($_POST['description']) ? $_POST['description'] : '';

//输出过滤结果
echo $Purifier->purify($html);
