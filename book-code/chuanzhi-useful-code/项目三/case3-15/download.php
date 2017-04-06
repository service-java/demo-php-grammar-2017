<?php
//指定要下载的文件路径
$filepath = './data.zip';
//获取文件大小
$filesize = filesize($filepath);
//获取文件名
$filename = basename($filepath);
//设置HTTP响应消息为文件下载
header('content-type:octet-stream');
header('content-length: '.$filesize);
header('content-disposition: attachment;filename="'.$filename.'"');
//以只读的方式打开文件
$fp = fopen($filepath, 'r'); //$fp表示文件流的指针
//读取文件并输出
$buffer = 1024;   //一次读取1KB的内容（即缓冲区，防止文件过大占用内存）
$count = 0;       //已读取字节数
//判断文件指针是否结束
while (!feof($fp) && ($filesize - $count > 0)){
	$data = fread($fp, $buffer);
	$count += $buffer;
	echo $data;
}
fclose($fp); //关闭文件