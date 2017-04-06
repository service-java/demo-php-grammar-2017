<?php
# @Author: 骆金参
# @Date:   2017-04-03T00:48:21+08:00
# @Email:  1095947440@qq.com
# @Filename: json-basic.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T00:54:36+08:00

// 数组转json
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
echo json_encode($arr); // {"a":1,"b":2,"c":3,"d":4,"e":5}

// 对象转json
class Emp {
    public $name = "";
    public $hobbies  = "";
    public $birthdate = "";
}
$e = new Emp();
$e->name = "汤姆";
$e->hobbies  = "sports";
$e->birthdate = date('m/d/Y h:i:s a', "8/5/1974 12:20:03 p");
$e->birthdate = date('m/d/Y h:i:s a', strtotime("8/5/1974 12:20:03"));

// echo json_encode($e);
echo json_encode($e, JSON_UNESCAPED_UNICODE);
// {"name":"sachin","hobbies":"sports","birthdate":"08\/05\/1974 12:20:03 pm"}


$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

var_dump(json_decode($json)); // 返回对象
var_dump(json_decode($json, true)); // 返回数组
