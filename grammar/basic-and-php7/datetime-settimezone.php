<?php
# @Author: 骆金参
# @Date:   2017-02-27T22:59:23+08:00
# @Email:  1095947440@qq.com
# @Filename: datetime.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T00:04:55+08:00

// 设定时区
date_default_timezone_set("Asia/ShangHai");
// echo date_default_timezone_get(),PHP_EOL;

echo time() . "\n"; // 1483346204
echo date('Y-m-d H:i:s') . "\n"; // 2017-01-02 09:36:44
// echo date('Y-m-d', time()); // 2017-01-02
echo date('L'); // 判断闰年
