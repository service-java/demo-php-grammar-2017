<?php
class Student{
	public $name;
	public $gender = 'male';
	public $is_clone = false;
	public function __construct($name, $gender=null) {
		$this->name = $name;
		if (!is_null($gender)) {
			$this->gender = $gender;
		}
	}
	public function __clone() {
		$this->is_clone = true;
	}
}