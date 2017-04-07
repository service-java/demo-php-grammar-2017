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
	//员工添加
	public function add(){
		//保存添加的员工信息
		$info = isset($_POST['data']) ? $_POST['data'] : '';
		//如果员工信息为空，则抛出异常
		if(empty($info)){
			throw new Exception('员工信息不能为空，添加失败！');
		}else{
			echo '添加员工成功'; 
		}
	}
}