<?php
# @Author: 骆金参
# @Date:   2017-04-02T14:05:49+08:00
# @Email:  1095947440@qq.com
# @Filename: index.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-02T15:24:10+08:00


/*
 * 发送：
 * GET  http://localhost/restful/class  列出所有班级
 * GET  http://localhost/restful/class/1    获取指定班的信息
 * POST http://localhost/restful/class?name=SAT班&count=23 新建一个班
 * PUT  http://localhost/restful/class/1?name=SAT班&count=23  更新指定班的信息（全部信息）
 * PATCH  http://localhost/restful/class/1?name=SAT班    更新指定班的信息（部分信息）
 * DELETE  http://localhost/restful/class/1 删除指定班
*/

require('Request.php');
require('Response.php');

$data = Request::getRequest(); //获取数据
Response::sendResponse($data); //输出结果
?>
