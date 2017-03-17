<?php
# @Author: 骆金参
# @Date:   2017-03-17T23:49:26+08:00
# @Email:  1095947440@qq.com
# @Filename: magic-bar-trait.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T23:49:49+08:00



class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();

// Hello World!
