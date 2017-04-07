<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:17+08:00
# @Email:  1095947440@qq.com
# @Filename: student.class.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T23:59:11+08:00


//定义student类
class student{

	public $name; 			//声明成员属性$name, 用来保存学生的姓名
	public $student_id; // 学生的年龄
	public $age; 				// 学生的年龄

	//声明成员方法introduce()，调用该方法让学生进行自我介绍
	public function introduce(){
		echo "大家好，我是{$this->name},今年{$this->age}岁。\n"
					,"我的学号是{$this->student_id},很高兴认识大家。\n";
	}

	//声明成员方法study()，调用该方法让学生开始学习
	public function study($time){
		$time = date("Y年m月d日 H:i:s",$time);
		echo "当前时间为{$time},学习中，请勿打扰....";
	}

	function __construct() {
		print "创建 " . $this->name . "对象\n";
	}

	function __destruct() {
		print "销毁 " . $this->name . "对象\n";
	}
}
