<?php
// 指定参数
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "db567";

// 面向对象实现
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 创建数据库
$sql = "CREATE DATABASE db567";
if ($conn->query($sql) === TRUE) {
    echo "数据库创建成功\n";
} else {
    echo "Error creating database: " . $conn->error;
}

// 注意加上数据库表
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "create table `news` (
  `id` int unsigned auto_increment primary key comment '新闻编号',
  `title` varchar(60) not null comment '新闻标题',
  `content` text not null comment '新闻内容',
  `addtime` timestamp default current_timestamp not null comment '发布时间'
)charset=utf8;";

// 创建数据库表
if ($conn->query($sql) === TRUE) {
    echo "数据库表创建成功\n";
} else {
    echo "Error creating table: " . $conn->error;
}


// 插入多条数据
$conn = new mysqli($servername, $username, $password, $dbname); // 注意加上数据库表
$sql = "INSERT INTO news (title, content)
VALUES ('Doe', 'john@example.com');";
$sql .=  "INSERT INTO news (title, content)
VALUES ('Moe', 'mary@example.com');";
$sql .= "INSERT INTO news (title, content)
VALUES (Dooley', 'julie@example.com')";

if ($conn->multi_query($sql) === TRUE) {
    echo "新记录插入成功\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// 查询
// 注意加上这句
// 报错是因为数据库表已存在, $conn失败
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM news;";
$result = $conn->query($sql);

// if($result = $conn->query($sql)) {
  // printf("Select returned %d rows.\n<br>", $result->num_rows);
// }

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ", $row["id"]
            , " - Title: ", $row["title"]
            , " " , $row["content"];
    }
} else {
    echo "结果为空";
}


$result->close(); // 注意关闭
$conn->close();
