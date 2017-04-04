<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "mydbpdo2wr";

$conn = new mysqli($servername, $username, $password, $dbname); // 创建连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 预处理及绑定
$stmt = $conn->prepare("INSERT INTO news (title, content) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $content);

// 设置参数并执行
$title = "John";
$content = "john@example.com";
$stmt->execute();

$title = "Julie";
$content = "julie@example.com";
$stmt->execute();
echo "新记录插入成功";

$stmt->close();
$conn->close();


// PDO实现
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // 设置 PDO 错误模式为异常

    // 预处理 SQL 并绑定参数
    $stmt = $conn->prepare("INSERT INTO news (title, content)
    VALUES (:title, :content)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);

    // 插入行
    $title = "Doe";
    $content = "john@example.com";
    $stmt->execute();

    echo "PDO新记录插入成功";
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
