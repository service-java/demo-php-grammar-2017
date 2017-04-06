<?php
// 低版本PHP 兼容 json_encode
function en_json($str)
{
  return urldecode(json_encode(url_encode($str)));
}

function url_encode($str)
{
  // 如果是数组
  // 对值循环进行转换
  if(is_array($str)) {
    foreach($str as $key => $v) {
      $str[urlencode($key)] = url_encode($v); // 递归
    }
  }

  // 不是数组，直接处理
  else {
    $str = urlencode($str);
  }

  return $str;
}

$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
echo en_json($arr) , PHP_EOL;
echo en_json($json) , PHP_EOL;

// var_dump(json_decode( en_json($arr) )); // 返回对象
