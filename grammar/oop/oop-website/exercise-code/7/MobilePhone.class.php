<?php
//实现通讯接口
class MobilePhone implements ComInterface{
	//连接
	public function connect(){
		echo '连接开始...';
	}
	//传输数据
	public function transfer(){
		echo '传输数据开始...';
		//假设这里进行数据传输
		//……
		//代码执行到此处，说明传输结束
		echo '传输数据结束';
	}
	//断开连接
	public function disconnect(){
		echo '断开连接...';
	}
}
