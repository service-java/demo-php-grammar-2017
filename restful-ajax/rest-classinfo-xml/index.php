<?php
# @Author: 骆金参
# @Date:   2017-04-02T14:05:49+08:00
# @Email:  1095947440@qq.com
# @Filename: index.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-02T15:24:10+08:00

require('Request.php');
require('Response.php');

$data = Request::getRequest(); //获取数据
Response::sendResponse($data); //输出结果
