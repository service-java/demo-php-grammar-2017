<?php

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
