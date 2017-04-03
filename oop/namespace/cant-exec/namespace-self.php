<?php
# @Author: 骆金参
# @Date:   2017-03-19T15:32:02+08:00
# @Email:  1095947440@qq.com
# @Filename: namespace-self.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T15:33:43+08:00


namespace MyProject;

use blah\blah as mine; // see "Using namespaces: importing/aliasing"

blah\mine(); // calls function blah\blah\mine()
namespace\blah\mine(); // calls function MyProject\blah\mine()

namespace\func(); // calls function MyProject\func()
namespace\sub\func(); // calls function MyProject\sub\func()
namespace\cname::method(); // calls static method "method" of class MyProject\cname
$a = new namespace\sub\cname(); // instantiates object of class MyProject\sub\cname
$b = namespace\CONSTANT; // assigns value of constant MyProject\CONSTANT to $b
