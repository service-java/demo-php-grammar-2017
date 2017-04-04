<?php
class Student {
	const GENDER_MALE = 1;
	const GENDER_FEMALE = 2;
	const GENDER_SECRET = 0;
	private $name;    //非静态属性
	private $gender;  //对象属性
	public function __construct($n) {
		$this->name = $n;
	}
	public function setGender($g = Student::GENDER_SECRET) {
		$this->gender = $g;
	}
}