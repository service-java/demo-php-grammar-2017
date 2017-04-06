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
	final public function getPrice() {
		return $this->price;
	}
}
//书商品
final class book extends goods {
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
//	public function getPrice() {//出错不能被重写
//	}
}