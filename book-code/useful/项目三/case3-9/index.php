<?php
$reg = '/n$/';
$name[] = 'neala';
$name[] = 'ben';
$name[] = 'johnson';
$name[] = 'nancy';
$name[] = 'nitya';
$name[] = 'thomas';
$name[] = 'jenna';
$res = array();
$res = preg_grep($reg, $name);
var_dump($res);