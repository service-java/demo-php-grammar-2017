<?php
// DOMDocument对象来处理xml
$xmlDoc = new DOMDocument();
$xmlDoc->load("restful-ajax/xml-json-basic/note.xml"); // 注意路径
// echo $xmlDoc->saveXML() , PHP_EOL;

// 读取各元素
$x = $xmlDoc->documentElement; // 获取各元素的总体集合
// 遍历循环
foreach ($x->childNodes AS $item) {
  echo $item->nodeName , " = " , $item->nodeValue , PHP_EOL;
}

// 写操作
// 将把这个数组的数据写成XML
$local_array = array(
  array('pid' => "1", "name"=>"kitty", "gender"=>"female"),
  array('pid' => "2", "name"=>"tom", "gender"=>"male"),
);

$doc = new DOMDocument('1.0');

// 创建根结点
$root = $doc->createElement('root');
$root = $doc->appendChild($root);

foreach($local_array as $a) {
  // 创建第2大节点person
  $table_id = 'person';
  $occ = $doc->createElement($table_id);
  $occ = $root->appendChild($occ); // 加入元素

  $fieldname = 'pid';
  $child = $doc->createElement($fieldname);
  $child = $occ->appendChild($child);

  $fieldvalue = $a['pid']; // 数组取值
  $value = $doc->createTextNode($fieldvalue);
  $value = $child->appendChild($value);

  $fieldname = 'name';
  $child = $doc->createElement($fieldname);
  $child = $occ->appendChild($child);

  $fieldvalue = $a['name']; // 数组取值
  $value = $doc->createTextNode($fieldvalue);
  $value = $child->appendChild($value);
}

$xml_string = $doc->saveXML();
echo $xml_string;
