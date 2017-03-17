<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:25+08:00
# @Email:  1095947440@qq.com
# @Filename: input_filter.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T23:32:32+08:00


header('content-type:text/html;charset=utf-8');

//trim()函数
echo trim('  测试  ');   //输出结果：“测试”
echo trim('  测 试 ');   //输出结果：“测 试”
echo trim("\n\t测试");   //输出结果：“测试”
echo "\n";

//intval()函数
echo intval('123abc');  //输出结果：123
echo intval(' 123abc'); //输出结果：123
echo intval('abc123');  //输出结果：0
echo "\n";


//strip_tags()函数
echo strip_tags('<b>测试</b>'); //输出结果：“测试”
echo strip_tags('<传智>播客');  //输出结果：“播客”
echo "\n";

//htmlspecialchars()函数
echo htmlspecialchars('<测试>');  //输出结果：“&lt;测试&gt;”
echo htmlspecialchars('<b>测试</b>'); //输出结果：“&lt;b&gt;测试&lt;/b&gt;gt;”
echo "\n";
