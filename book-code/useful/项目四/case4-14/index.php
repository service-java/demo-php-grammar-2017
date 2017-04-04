<?php
header('Content-Type:text/html;charset=utf-8');
class student {
	private $name;
	private $age;
	private $height;
	public function __construct($n, $a, $h) {
		$this->name = $n;
		$this->age = $a;
		$this->height = $h;
	}
	public function setName($n) {
		$this->name = $n;
	}
	public function getName() {
		return $this->name = $n;
	}
}