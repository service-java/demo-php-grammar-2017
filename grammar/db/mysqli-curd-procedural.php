<?php
// http://blog.csdn.net/koastal/article/details/50650496
header('Content-Type:text/html;charset=utf-8');

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "db7885";

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}

// 创建数据库
$sql = "CREATE DATABASE $dbname";
if (mysqli_query($conn, $sql)) {
    echo "数据库创建成功<br>";
} else {
    echo "Error creating database: " , mysqli_error($conn) , "<br>";
}

// 重置连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "create table `news` (
  `id` int unsigned auto_increment primary key comment '新闻编号',
  `title` varchar(60) not null comment '新闻标题',
  `content` text not null comment '新闻内容',
  `addtime` timestamp default current_timestamp not null comment '发布时间'
)charset=utf8;";

if(mysqli_query($conn, $sql)) {
  echo "建表成功<br>\n";
} else {
  echo "Error creating table: ", mysqli_error($conn), "<br>";
}


// 插入多条数据
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "INSERT INTO news (title, content)
VALUES ('Doe', 'john@example.com');";
$sql .=  "INSERT INTO news (title, content)
VALUES ('Moe', 'mary@example.com');";
$sql .= "INSERT INTO news (title, content)
VALUES (Dooley', 'julie@example.com')";

if (mysqli_multi_query($conn, $sql)) {
    echo "新记录插入成功<br>\n";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


// 查询
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "select * from news;";
$result = mysqli_query($conn, $sql);

// $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
// echo "共".count($rows)."条记录：";


// 关联数组
while ($row = mysqli_fetch_assoc($result)) {
    echo "<br> id: ", $row["id"]
        , " - Title: ", $row["title"]
        , " " , $row["content"];
}

mysqli_free_result($result); // 释放结果集
mysqli_close($conn); // 关闭
