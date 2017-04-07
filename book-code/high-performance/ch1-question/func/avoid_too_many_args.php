<?php
# @Author: 骆金参
# @Date:   2017-03-20T18:26:14+08:00
# @Email:  1095947440@qq.com
# @Filename: avoid_too_many_args.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-20T19:00:24+08:00

// 使用数组
function test($args) {
  $first = $args[0];
  $second = $args[1];
  echo $first,$second,"\n";
}

test(array('dude ','where is'));

// 使用对象
class User {
  var $name;
  var $gender;
  var $email;
}

class UserTmpl {
  public function render(User $user) {
    echo $user->name," ",$user->gender," ",$user->email,PHP_EOL;
  }
}

$user = new User();
$user->name = "luo0412";
$user->gender = "male";
$user->email = "1095847440@qq.com";

$tmpl = new UserTmpl; // 注意可以没有()
$tmpl->render($user);
