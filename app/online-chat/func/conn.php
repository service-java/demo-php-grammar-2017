<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 连接数据库
    Update    : 
-->

<?php 
    $conn = mysql_connect("localhost","root","root"); 
    $db = mysql_select_db("qmen", $conn);  //选择操作的数据库
    $sql = "set names utf8";  //中文编码
    mysql_query($sql);
    date_default_timezone_set('Asia/Shanghai');
 ?>