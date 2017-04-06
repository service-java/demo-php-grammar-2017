<?php
$xml = simplexml_load_file("restful-ajax/xml-json-basic/note.xml");
// print_r($xml);

// 直接读
// echo $xml->to . "<br>";
// echo $xml->from . "<br>";
// echo $xml->heading . "<br>";
// echo $xml->body;

// 键值输出
// echo $xml->getName() . "<br>";
// foreach($xml->children() as $child)
// {
//     echo $child->getName() . ": " . $child . "<br>";
// }

// 写操作
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><plays />');

$play = $xml->addChild('play');
$play->addChild('title', "剧名");
$author = $play->addChild('author', '作者');
$author->addAttribute('id', '001');

// echo $xml->asXML();


// 删除操作
$xml2 = simplexml_load_file("restful-ajax/xml-json-basic/note.xml");
unset($xml2->body[0]); // 不经过root结点
print_r(get_object_vars($xml2));
