<?php
//定义员工类
class Employee{
	//成员变量
	private $_name;
	private $_age;
	//构造方法
	public function __construct($name,$age){
		//为私有属性赋值
		$this->_name = $name;
		$this->_age = $age;
	}
	//成员方法
	public function introduce(){
		echo '大家好，我叫'.$this->_name.'，今年'.$this->_age.'岁！<br>';
	}
}