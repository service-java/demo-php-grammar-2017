<?php
header('Content-Type:text/html;charset=utf-8');
abstract class goods {
	public $name;
	public $price;
	public function __construct($name, $price) {
		$this->name = $name;
		$this->price = $price;
	}
	abstract function getName();
	public function getPrice() {
		return $this->price;
	}
}
//书商品
class book extends goods {
	public $author;
	public $publisher;
	public function __construct($author, $publisher, $name, $price) {
		parent::__construct($name, $price);
		$this->author = $author;
		$this->publisher = $publisher;
	}
	public function getName() {
		return '《' . $this->name . '》';
	}
}
//电话商品
class phone extends goods {
	public $brand;
	public $color;
	public function getName() {
		return $this->name;
	}
}
//$good = new goods('商品', '100.1');//失败