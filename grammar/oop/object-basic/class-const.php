<?php
# @Author: 骆金参
# @Date:   2017-03-18T00:05:19+08:00
# @Email:  1095947440@qq.com
# @Filename: class-const.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-18T00:10:26+08:00


class MyClass {
    const constant = '常量值'; // 没有$

    function showConstant() {
        echo  self::constant . PHP_EOL;
    }
}

echo MyClass::constant . PHP_EOL;

$classname = "MyClass";
echo $classname::constant . PHP_EOL; // 自 5.3.0 起

$class = new MyClass();
$class->showConstant();

echo $class::constant . PHP_EOL; // 自 PHP 5.3.0 起

// parent::__construct(); // 调用父类的构造方法
// Static 关键字 不实例化直接访问
// final
// 方法被声明为 final，则子类无法覆盖该方法
// 类被声明为 final，则不能被继承。
