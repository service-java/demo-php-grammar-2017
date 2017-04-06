<?php
// 使用XMLReader方法
$reader = new XMLReader();
$reader->open('restful-ajax/xml-json-basic/note.xml');

// 只要能读就循环
// while($reader->read()) {
//   if($reader->nodeType == XMLReader::TEXT) {
//     echo $reader->value , PHP_EOL;
//   }
// }

while($reader->read()) {
  // nodeName赋值
  if($reader->nodeType == XMLReader::ELEMENT) {
    $nodeName = $reader->name;
  }

  // 文本内容并且不为空
  if($reader->nodeType == XMLReader::TEXT && !empty($nodeName)) {
    switch($nodeName) {
      case 'to':
        $to = $reader->value;
        break;
      case 'from':
        $from = $reader->value;
        break;
      case 'heading':
        $heading = $reader->value;
        break;
      case 'body':
        $body = $reader->value;
        break;
    }
  }
}

echo $from , " to " , $to , " : ", PHP_EOL;
echo $heading , PHP_EOL;
echo $body , PHP_EOL;

$reader->close(); // 关闭
