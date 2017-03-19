<?php
//定义员工类
class Employee{
	//成员属性
	public $name;
	public $age;
	//成员方法
	public function introduce(){
		echo '大家好，我叫'.$this->name.'，今年'.$this->age.'岁！<br>';
	}
}