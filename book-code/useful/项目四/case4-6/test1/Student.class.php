<?php
class Student{
	public $name;
	public $gender = 'male';
	public function __construct($name, $gender=null) {
		$this->name = $name;
		if (!is_null($gender)) {
			$this->gender = $gender;
		}
	}
}