<?php
# @Author: 骆金参
# @Date:   2017-04-03T00:22:39+08:00
# @Email:  1095947440@qq.com
# @Filename: zip.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T00:23:47+08:00

$zip = zip_open("test.zip") or die("nothing");
echo($zip); // 11
