<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:17+08:00
# @Email:  1095947440@qq.com
# @Filename: book.class.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T22:50:14+08:00


header('content-type:text/html;charset=utf-8');
//载入goods类文件
require './goods.class.php';

//定义book类，继承goods类
class book extends goods{
	//由于父类getName方法是抽象方法，因此在这里必须实现
	public function getName(){
		return '书名：《'.$this->name.'》';
	}
}

//实例化book类
$book = new book('PHP高级教程',45);
echo $book->getName();
echo '<hr>';
echo $book->getPrice(); //父类good类中getPrice是final方法，无法被重写
