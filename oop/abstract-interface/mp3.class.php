<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:17+08:00
# @Email:  1095947440@qq.com
# @Filename: mp3.class.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T22:51:27+08:00


header('content-type:text/html;charset=utf-8');
//载入interface.php文件
require './interface.php';

//使用implements关键字实现usb接口
class mp3 implements usb{
	public function connect(){
		echo '开始连接<br>';
	}
	public function transfer() {
		echo '开始传输....传输结束<br>';
	}
	public function disconnect() {
 		echo '断开<br>';
 	}
}
$mp3 = new mp3;
$mp3->connect();
$mp3->transfer();
$mp3->disconnect();
