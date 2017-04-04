<?php
# @Author: 骆金参
# @Date:   2017-04-03T01:53:41+08:00
# @Email:  1095947440@qq.com
# @Filename: filter-input-arr.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T01:55:28+08:00

// http://localhost/hello-php/grammar/form-arr-str-regex-filter/filter-input-arr.php?age=83&email=1097@qq.com

header("Content-type:text/html;charset=utf-8;");

$filters = array (
   // 判断是不是string
    "name" => array(
        "filter"=>FILTER_SANITIZE_STRING
    ),
    // 判断年龄范围
    "age" => array (
        "filter"=>FILTER_VALIDATE_INT,
        "options"=>array (
            "min_range"=>1,
            "max_range"=>120
        )
    ),
    // 判断是不是email
    "email"=> FILTER_VALIDATE_EMAIL
);

$result = filter_input_array(INPUT_GET, $filters);

if (!$result["age"]) {
    echo("年龄必须在 1 到 120 之间。") , PHP_EOL;
}
elseif(!$result["email"]) {
    echo("E-Mail 不合法<br>") , PHP_EOL;
}
else {
    echo  "输入正确<br>"  , PHP_EOL;
}


// FILTER_CALLBACK
// 将下划线转化成点
function convertSpace($string) {
    return str_replace("_", ".", $string);
}

$string = "www_runoob_com!";
echo filter_var($string, FILTER_CALLBACK, array("options"=>"convertSpace"));
