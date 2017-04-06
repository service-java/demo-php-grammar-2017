<?php
//准备要作为文件下载的内容
$data = 'This is a file.';
//获取字符串字节数
$filesize = strlen($data);
//设定文件名
$filename = 'data.txt';
//设置HTTP响应消息为文件下载
header('content-type: octet-stream'); //表示内容是二进制流，不属于某种文件类型
header('content-length: '.$filesize);
header('content-disposition: attachment;filename="'.$filename.'"');
echo $data; //输出的内容将被作为文件进行下载