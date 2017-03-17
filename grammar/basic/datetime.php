<?php
# @Author: 骆金参
# @Date:   2017-02-27T22:59:23+08:00
# @Email:  1095947440@qq.com
# @Filename: datetime.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-18T01:34:20+08:00


date_default_timezone_set("Asia/ShangHai"); // 设定时区
echo date_default_timezone_get(),PHP_EOL;

echo time() . "\n"; // 1483346204
echo date('Y-m-d H:i:s') . "\n"; // 2017-01-02 09:36:44
echo date('Y-m-d', time()); // 2017-01-02
