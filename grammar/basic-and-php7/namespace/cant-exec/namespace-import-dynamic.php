<?php
# @Author: 骆金参
# @Date:   2017-03-19T15:37:35+08:00
# @Email:  1095947440@qq.com
# @Filename: namespace-import-dynamic.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T15:38:41+08:00

use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // 实例化一个 My\Full\Classname 对象
$a = 'Another';
$obj = new $a;      // 实际化一个 Another 对象

// echo $obj;

$obj = new Another; // instantiates object of class My\Full\Classname
$obj = new \Another; // instantiates object of class Another
$obj = new Another\thing; // instantiates object of class My\Full\Classname\thing
$obj = new \Another\thing; // instantiates object of class Another\thing
