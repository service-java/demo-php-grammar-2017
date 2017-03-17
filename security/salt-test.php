<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:25+08:00
# @Email:  1095947440@qq.com
# @Filename: salt-test.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T23:32:25+08:00



// 加盐
// 数据库中还要有一个salt字段
// 也可以采用某个字段作salt,例如用户名字段
// 所以用户名是像github一样的不可更改
$salt = md5(uniqid(microtime()));
echo "根据时间生成盐 " . $salt . "\n";
echo "加盐生成密码   " . md5($salt.md5("imedia666")) . "\n";

// hash
$pwd = "ljc578762";
echo "hash以后的密码 " . hash('sha512', $pwd);
