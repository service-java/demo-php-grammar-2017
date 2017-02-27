<?php
//定义员工类
class Employee{
	//成员变量
	protected $_name;
	protected $_age;

	//成员方法
	public function introduce(){
		echo '大家好，我叫'.$this->_name.'，今年'.$this->_age.'岁！<br>';
	}

	//设置成员属性值
	public function __set($name,$value){
		$this->$name = $value;
	}

	//获取成员属性值
	public function __get($name){
		if(isset($this->$name)){
			return $this->$name;
		}else{
			return NULL;
		}
	}
}