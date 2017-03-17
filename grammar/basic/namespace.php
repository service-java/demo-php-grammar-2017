<?php
# @Author: 骆金参
# @Date:   2017-03-18T01:39:12+08:00
# @Email:  1095947440@qq.com
# @Filename: namespace.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-18T01:40:09+08:00


// declare(encoding='UTF-8'); //定义多个命名空间和不包含在命名空间中的代码
namespace MyProject {

  const CONNECT_OK = 1;
  class Connection { /* ... */ }
  function connect() { /* ... */  }
}

namespace { // 全局代码
  session_start();
  $a = MyProject\connect();
  echo MyProject\Connection::start();
}
