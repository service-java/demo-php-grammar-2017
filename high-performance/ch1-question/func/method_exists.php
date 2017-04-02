<?php
# @Author: 骆金参
# @Date:   2017-03-19T23:02:48+08:00
# @Email:  1095947440@qq.com
# @Filename: method_exists.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-20T20:20:30+08:00

// is_callable
// 运行环境是否课件
// 能否在当前作用域调用它的方法
// 可以是全局函数，也可以是类方法
// 能判断权限private public
// if(is_callable(array($object, 'SomeMethod'))) {
//   $object->SomeMethod($this, TRUE);
// }
//
// // method_exists
// if(method_exists($object, 'SomeMethod')) {
//   $object->SomeMethod($this, TRUE);
// }


// 使用__call魔术方法
class MethodTest {
  public function __call($name, $arguments)
  {
    echo 'Calling object method ' , $name , ' ' , implode(', ', $arguments) ,PHP_EOL;
  }
}

$obj = new MethodTest();
$obj->runtest('in object context'); // Calling object method runtest in object context
var_dump(method_exists($obj, 'runtest')); // bool(false)
var_dump(is_callable(array($obj, 'runtest'))); // bool(true) TRUE
