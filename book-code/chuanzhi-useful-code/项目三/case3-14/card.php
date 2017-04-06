<?php
header('Content-Type:text/html;charset=utf-8');
if($_POST){
	//从$_POST取出 姓名、学科、学号、网站
	$data = array();
	foreach(array('name','subject','number','url') as $v){
		$data[$v] = isset($_POST[$v]) ? $_POST[$v] : '';
	}
	//取出卡片背景图 PNG 图像
	$image = imagecreatefrompng('card.png');
	//设定图像的混色模式
	imagealphablending($image, true);
	//为图像分配颜色
	$color = imagecolorallocate($image, 51, 102, 255);
	//使用Windows自带的宋体字体将文本写入图像中
	$font = "C:\Windows\Fonts\simsun.ttc";
	imagefttext($image, 12, 0, 128, 103, $color, $font, $data['name']);
	imagefttext($image, 12, 0, 128, 130, $color, $font, $data['subject']);
	imagefttext($image, 12, 0, 128, 156, $color, $font, $data['number']);
	imagefttext($image, 12, 0, 128, 182, $color, $font, $data['url']);
	//输出图像，将图片显示在浏览器中
	header('Content-Type:image/png');	//设定输出内容为PNG图像
	imagepng($image);					//输出图像到浏览器
	imagedestroy($image);				//销毁图像资源
	exit;
}
exit('没有输入信息！');