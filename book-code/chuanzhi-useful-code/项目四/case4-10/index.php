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
	public function __construct($author, $publisher, $name, $price) {
		parent::__construct($name, $price);
		$this->author = $author;
		$this->publisher = $publisher;
	}
	public function getName() {
		return '《' . $this->name . '》';
	}
} 
$book1 = new book('PHP教研组', 'ITCAST', 'PHP实例教程', 85);
echo $book1->getName();