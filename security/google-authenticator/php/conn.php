<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:24+08:00
# @Email:  1095947440@qq.com
# @Filename: conn.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T23:27:01+08:00


$conn = new mysqli ("localhost", "root","root","user");
if (mysqli_connect_error())
{
  printf("Connect failed: %s\n",mysqli_connect_error());
  exit;
}
$sql = "set names 'utf8'";
@mysqli_query($conn,$sql);

?>
