<?php
# @Author: 骆金参
# @Date:   2017-04-03T01:47:15+08:00
# @Email:  1095947440@qq.com
# @Filename: filter.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T01:52:38+08:00


$int = 300;

if(!filter_var($int, FILTER_VALIDATE_INT)) {
    echo("不是一个合法的整数");
}
else {
    echo("是个合法的整数");
}

$int_options = array( "options"=>array(
        "min_range"=>0,
        "max_range"=>256
    )
);

if(!filter_var($int, FILTER_VALIDATE_INT, $int_options))
{
    echo("不是一个合法的整数");
}
else
{
    echo("是个合法的整数");
}

// 净化输入
// if(!filter_has_var(INPUT_GET, "url"))
// {
// 	echo("没有 url 参数");
// }
// else
// {
// 	$url = filter_input(INPUT_GET,
// 	"url", FILTER_SANITIZE_URL);
// 	echo $url;
// }
