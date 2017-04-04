<?php
class Student{
	public $name;
	public $gender = 'male';
	//public function Student($name, $gender=null) {//类同名方法
	public function __construct($name, $gender=null) {
		$this->name = $name;
		if (!is_null($gender)) {
			$this->gender = $gender;
		}
	}
	public function sayHello(){
		return '大家好，我是' . $this->name;
	}
}