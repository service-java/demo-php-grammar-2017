<?php
# @Author: 骆金参
# @Date:   2017-03-14T23:09:17+08:00
# @Email:  1095947440@qq.com
# @Filename: echo-print.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-14T23:13:22+08:00


function get_username() {
  return "root";
}
function get_userpwd() {
  return "root";
}

echo "用户信息".get_username()."密码".get_userpwd(); // 0.147s
echo "用户信息",get_username(),"密码",get_userpwd(); // 0.106s
