<?php
/**
 * 添加水印功能
 * @param string $source  原图
 * @param string $water   水印图片
 * @param int    $postion 添加水印位置，1表示左上角
 * @param string $path    水印图片存放路径，默认为空，表示在当前目录
 */
function watermark($source, $water, $postion=1, $path=''){
	//设置水印图片名称前缀
	$waterPrefix = 'water_';
	//图片类型和对应创建画布资源的函数名
	$from = array(
		'image/gif'  => 'imagecreatefromgif',
		'image/png'  => 'imagecreatefrompng',
		'image/jpeg' => 'imagecreatefromjpeg'
	);
	//图片类型和对应生成图片的函数名
	$to = array(
		'image/gif'  => 'imagegif',
		'image/png'  => 'imagepng',
		'image/jpeg' => 'imagejpeg'
	);
	//获取原图和水印图片信息
	$src_info = getimagesize($source);
	$water_info = getimagesize($water);
	//从数组中获取原图和水印图片的宽和高
	list($src_w, $src_h, $src_mime) = $src_info;
	list($wat_w, $wat_h, $wat_mime) = $water_info;
	//获取各图片对应的创建画布函数名
	$src_create_fname = $from[$src_info['mime']];
	$wat_create_fname = $from[$water_info['mime']];
	//使用可变函数来创建画布资源
	$src_img = $src_create_fname($source); 
	$wat_img = $wat_create_fname($water);
	//水印位置
	switch ($postion) {			
		case 1: //左上
			$src_x = 0;
			$src_y = 0;
			break;	
		case 2: //右上
			$src_x = $src_w - $wat_w;
			$src_y = 0;
			break;	
		case 3: //中间
			$src_x = ($src_w - $wat_w)/2;
			$src_y = ($src_h - $wat_h)/2;
			break;	
		case 4: //左下
			$src_x = 0;
			$src_y = $src_h - $wat_h;
			break;	
		default: //右下
			$src_x = $src_w - $wat_w;
			$src_y = $src_h - $wat_h;
			break;	
	}
	
	/**
	  * 生成水印方式一：将水印图片添加到目标图标上
	  * @param resource $src_img 原图像资源
	  * @param resource $wat_img 水印图像资源
	  * @param int $src_x  水印图片在原图像中的横坐标
	  * @param int $src_y  水印图片在原图像中的纵坐标
	  * @param int 0, 0    水印图片的横坐标和纵坐标
	  * @param int $wat_w  水印图片的宽
	  * @param int $wat_h  水印图片的高
	  */
	imagecopy($src_img, $wat_img, $src_x, $src_y, 0, 0, $wat_w, $wat_h);

	//生成水印方式二：使用imagecopymerge()函数设置半透明水印
	//最后一个参数为透明度，取值范围0~100
	//imagecopymerge($src_img, $wat_img, $src_x, $src_y, 0, 0, $wat_w, $wat_h, 50);
		
	//生成带水印的图片路径
	$waterfile = $path.$waterPrefix.basename($source);
	//获取输出图片格式的函数名
	$generate_fname = $to[$src_info['mime']];
	//将添加水印后的图片输出到指定目录
	if($generate_fname($src_img, $waterfile)){
		return $waterfile;
	}else{
		return false;
	}
}