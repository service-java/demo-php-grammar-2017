<?php
$this->assign('title', 'SQL语句查询');
// $this->layout = 'index';

use Cake\Datasource\ConnectionManager;
$connection = ConnectionManager::get('default');
$result = $connection
  ->execute('SELECT * FROM students')
  ->fetchAll('assoc');

foreach($result as $row) {
  echo $row['name'] , " : " ,$row['favorite'] , "<br>";
}
echo "<hr>";

// 安全传参
$stmt = $connection
  ->prepare('SELECT * FROM students WHERE name = ? AND gender = ?');

$stmt->bind(
  ['tom', '男'],
  ['string', 'string'] // 数据类型
);

$stmt->execute();
$result = $stmt->fetchAll('assoc');

foreach($result as $row) {
  echo $row['name'] , " : " ,$row['favorite'] , "<br>";
}
