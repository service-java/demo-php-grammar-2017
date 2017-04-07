<?php
# @Author: 骆金参
# @Date:   2017-03-20T18:08:23+08:00
# @Email:  1095947440@qq.com
# @Filename: here_now_doc.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-20T18:15:17+08:00


$hello = 1;

// HereDoc
// 嵌入一段文本内容
// 会解析变量
// 自然换行 不要用tab等避免报错
echo <<<THIS_HEREDOC
 php
 heredoc {$hello}
THIS_HEREDOC;

// NowDoc
// $mystring =<<'END_TEXT'
// "'gh {$hello}'"
// END_TEXT;
// echo "<pre>$mystring</pre>"
