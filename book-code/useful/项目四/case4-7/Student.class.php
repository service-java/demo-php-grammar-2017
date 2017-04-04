<?php
class Student {
	private $name;    //非静态属性
	private $gender; //对象属性
	private static $counter = 0;//计数器
	public function __construct($n, $g) {
		$this->name = $n;
		$this->gender = $g;
		++self::$counter;
	}
	public function __clone() {
		++self::$counter;
	}
	public function __destruct() {
		--student::$counter;
	}
	public static function getCounter() {
		return self::$counter;
	}
}