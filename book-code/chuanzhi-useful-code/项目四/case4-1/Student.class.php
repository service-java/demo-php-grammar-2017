<?php
class Student{
	public $name;
	public $gender = 'male';
	public function sayHello(){
	     return '大家好，我是' . $this->name;
	}
}