<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:17+08:00
# @Email:  1095947440@qq.com
# @Filename: upload_object.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T22:43:32+08:00


header('content-type:text/html;charset=utf-8'); //声明文件解析的编码格式
require './upload.class.php'; //载入文件上传类文件

//判断是否有文件上传
if (isset($_FILES['pic'])) {

    //实例化upload对象
    $upload = new upload;

    //调用upload类的up方法，并把相关参数传递进去
    if (!($pic_path = $upload->up($_FILES['pic'], 'user_'))) {

        //如果上传失败，则获取对象的error属性并显示
        echo $upload->getError();

		//最后终止脚本执行
		die;
    }
}

//载入html模板文件
require './upload_html.php';
