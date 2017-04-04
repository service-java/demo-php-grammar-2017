<?php
header('Content-Type:text/html;charset=utf-8');
//判断是否收到表单数据
if($_POST){
	//接收并转义
	$data = array('time'=>date('Y-m-d H:i:s'));
	foreach(array('author','email','content') as $v){
		$data[$v] = isset($_POST[$v]) ? htmlspecialchars($_POST[$v]) : '';
	}
	//生成文件名，根据时间戳和随机数
	$filename = time().rand(1, 10000).'.txt';
	//保存文件
	file_put_contents($filename, serialize($data));
	exit("<p>留言成功。</p><p>文件名：<a href=\"show.php?filename=$filename\">$filename</a></p>");
}
exit('没有提交留言！');