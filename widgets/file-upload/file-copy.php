<?php
/**
 * @Author: luo0412
 * @Date:   2017-03-19 16:26:47
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T18:41:56+08:00
 */


if(!file_exists("source.txt")) {
    echo "source.txt文件不存在, 请先创建";
}
elseif(!file_exists("target.txt")) {
    echo "target.txt文件不存在, 现已创建";
    fopen("target.txt", "w"); //  不存在则创建
}
else {
    file_put_contents("target.txt", "\n" . file_get_contents("source.txt"), FILE_APPEND); // 追加内容
}
