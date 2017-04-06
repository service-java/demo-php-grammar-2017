<?php
class Student{
	public $name;
	public $gender = 'male';
	public function __construct($name, $gender=null) {
		$this->name = $name;
		if (!is_null($gender)) {
			$this->gender = $gender;
		}
	}
	public function __destruct() {
		//根据实际情况改写用户密码
	  	$link = mysqli_connect('localhost:3306', 'root', '123456') or die('数据库连接失败！');
		//根据实际情况改写字符集
	  	mysqli_query($link, 'set names utf8');
	  	mysqli_query($link, "insert into itcast.student (name, gender) values ('$this->name', '$this->gender')");
	}
}