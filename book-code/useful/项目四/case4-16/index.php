<?php
require './Captcha.class.php';
//实例化验证码类
$captcha = new Captcha();
//获取创建的验证码图片
$captcha->create();