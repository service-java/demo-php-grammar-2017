<?php
$xml=simplexml_load_file("restful-ajax/xml-json-basic/note.xml");
// print_r($xml);

echo $xml->to . "<br>";
echo $xml->from . "<br>";
echo $xml->heading . "<br>";
echo $xml->body;


echo $xml->getName() . "<br>";
foreach($xml->children() as $child)
{
    echo $child->getName() . ": " . $child . "<br>";
}
