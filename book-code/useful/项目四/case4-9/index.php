<?php
header('Content-Type:text/html;charset=utf-8');
class goods {
	public $name;
	public $price;
	public function __construct($name, $price) {
		$this->name = $name;
		$this->price = $price;
	}
	public function getName() {
		return $this->name;
	}
	public function getPrice() {
		return $this->price;
	}
}
//书商品
class book extends goods {
	public $author;
	public $publisher;
}
//电话商品
class phone extends goods {
	public $brand;
	public $color;
}
$book1 = new book('PHP实例教程', 85);
$phone1 = new phone('Nokia 1110', 110);
var_dump($book1, $phone1);