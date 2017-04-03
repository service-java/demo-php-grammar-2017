<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("restful-ajax/basic/note.xml"); // 注意路径
print $xmlDoc->saveXML();
echo "\n";

$x = $xmlDoc->documentElement;
foreach ($x->childNodes AS $item)
{
print $item->nodeName . " = " . $item->nodeValue . "<br>";
}
