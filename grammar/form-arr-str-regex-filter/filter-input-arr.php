<?php
# @Author: 骆金参
# @Date:   2017-04-03T01:53:41+08:00
# @Email:  1095947440@qq.com
# @Filename: filter-input-arr.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T01:55:28+08:00


$filters = array
(
    "name" => array
    (
        "filter"=>FILTER_SANITIZE_STRING
    ),
    "age" => array
    (
        "filter"=>FILTER_VALIDATE_INT,
        "options"=>array
        (
            "min_range"=>1,
            "max_range"=>120
        )
    ),
    "email"=> FILTER_VALIDATE_EMAIL
);

$result = filter_input_array(INPUT_GET, $filters);

if (!$result["age"])
{
    echo("年龄必须在 1 到 120 之间。<br>");
}
elseif(!$result["email"])
{
    echo("E-Mail 不合法<br>");
}
else
{
    echo("输入正确");
}





// FILTER_CALLBACK
function convertSpace($string)
{
    return str_replace("_", ".", $string);
}

$string = "www_runoob_com!";

echo filter_var($string, FILTER_CALLBACK,
array("options"=>"convertSpace"));
