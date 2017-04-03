<?php
# @Author: 骆金参
# @Date:   2017-04-03T12:54:26+08:00
# @Email:  1095947440@qq.com
# @Filename: xml-expat.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T12:56:46+08:00


//Initialize the XML parser
$parser=xml_parser_create();

//Function to use at the start of an element
function start($parser,$element_name,$element_attrs)
{
switch($element_name)
{
case "NOTE":
echo "-- Note --<br>";
break;
case "TO":
echo "To: ";
break;
case "FROM":
echo "From: ";
break;
case "HEADING":
echo "Heading: ";
break;
case "BODY":
echo "Message: ";
}
}

//Function to use at the end of an element
function stop($parser,$element_name)
{
echo "<br>";
}

//Function to use when finding character data
function char($parser,$data)
{
echo $data;
}

//Specify element handler
xml_set_element_handler($parser,"start","stop");

//Specify data handler
xml_set_character_data_handler($parser,"char");

//Open XML file
$fp=fopen("restful-ajax/basic/note.xml","r");

//Read data
while ($data = fread($fp,4096))
{
xml_parse($parser,$data,feof($fp)) or
die (sprintf("XML Error: %s at line %d",
xml_error_string(xml_get_error_code($parser)),
xml_get_current_line_number($parser)));
}

//Free the XML parser
xml_parser_free($parser);
