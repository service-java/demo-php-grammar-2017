<?php
header('Content-Type:text/html;charset=utf-8');
//载入水印生成函数
require './function/watermark.php';
//调用函数生成水印
if($file = watermark('./picture.jpg', './logo.gif')){
	echo '<p>生成水印成功：</p><img src="'.$file.'" />';
}else{
	echo '生成水印失败。';
}