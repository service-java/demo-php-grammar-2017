<?php
//员工类
class Employee{
	//成员变量
	private $_name = '';
	private $_age = '';

	//成员方法
	public function introduce(){
		echo '大家好，我叫'.$this->_name.'，今年'.$this->_age.'岁！<br>';
	}
}