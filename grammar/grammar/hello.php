<?php
// include "hi.php";
include("hi.php");
echo add(1,8) . "\n"; // 9

$name = isset($_GET['name']) ? $_GET['name'] : "";
echo $name;
$name = urlencode("A&B C");
echo $name . "\n"; // A%26B+C
