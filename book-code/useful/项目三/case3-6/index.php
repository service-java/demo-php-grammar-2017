<?php
function test() {
	$addr = 'beijing';
	echo '$addr is ' . $addr, '<br />';
	echo '$addr is ' . $GLOBALS['addr'];
}
$addr = 'tianjin';
test();