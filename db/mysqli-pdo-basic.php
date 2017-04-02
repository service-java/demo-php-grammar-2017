<?php
# @Author: 骆金参
# @Date:   2017-04-03T02:02:38+08:00
# @Email:  1095947440@qq.com
# @Filename: mysqli-pdo-basic.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T02:07:46+08:00


$servername = "127.0.0.1";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "连接成功";
$conn->close(); // 面向对象
// mysqli_close($conn); // 面向过程

try {
    $conn2 = new PDO("mysql:host=$servername;dbname=mysql", $username, $password);
    echo "连接成功";
}
catch(PDOException $e) {
    echo $e->getMessage();
}
$conn2 = null;
