<?php
//定义管理层员工类
class ManageEmployee extends Employee{
	//重写父类introduce()方法
	public function introduce(){
		echo '管理层员工：'.$this->_name.'，愿做企业的桥梁！<br>';
	}
}