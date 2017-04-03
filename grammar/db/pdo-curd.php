<?php
header('Content-Type:text/html;charset=utf-8');

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "myDBPDO2wr";

try {
    $conn = new PDO("mysql:host=$servername;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // 设置 PDO 错误模式为异常

    // 建立数据库
    $sql = "CREATE DATABASE $dbname";
    $conn->exec($sql); // 使用 exec() ，因为没有结果返回
    echo "数据库创建成功<br>";

    // 建立数据库表
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "create table `news` (
      `id` int unsigned auto_increment primary key comment '新闻编号',
      `title` varchar(60) not null comment '新闻标题',
      `content` text not null comment '新闻内容',
      `addtime` timestamp default current_timestamp not null comment '发布时间'
    )charset=utf8;";
    $conn->exec($sql);

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}


// 插入多条数据
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction(); // 开始事务
    $conn->exec("INSERT INTO news (title, content)
    VALUES ('Doe', 'john@example.com')");
    $conn->exec("INSERT INTO news (title, content)
    VALUES ('Moe', 'mary@example.com')");
    $conn->exec("INSERT INTO news (title, content)
    VALUES ('Dooley', 'julie@example.com')");

    $conn->commit(); // 提交事务
    echo "新记录插入成功<br>";
} catch(PDOException $e) {
    $conn->rollback(); // 如果执行失败回滚
    echo $sql . "<br>" . $e->getMessage() , "<br>";
}

// class TableRows extends RecursiveIteratorIterator {
//     function __construct($it) {
//         parent::__construct($it, self::LEAVES_ONLY);
//     }
//
//     function current() {
//       return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
//     }
//
//     function beginChildren() { echo "<tr>"; }
//     function endChildren() { echo "</tr>" . "\n"; }
// }



// 查询数据库
// echo "<table style='border: solid 1px black;'>";
// echo "<tr><th>Id</th><th>Title</th><th>Content</th><th>AddTime</th></tr>";
// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//     $stmt = $conn->prepare("SELECT * FROM news");
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); // 设置结果集为关联数组
//
//     foreach(
//         new TableRows(
//             new RecursiveArrayIterator($stmt->fetchAll())
//         ) as $k => $v
//     ) {
//         echo $v;
//     }
//     $dsn = null;
// } catch(PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }
// echo "</table>";

// 查看数据
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("SELECT * FROM news;");
  $stmt->execute();

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo $row['id'] , " : " , $row['title'] , "<br>";
  }

} catch(PDOException $e) {
  echo "Error: " , $e->getMessage() , "\n";
}


$conn = null; // PDO关闭清除$conn的方法
