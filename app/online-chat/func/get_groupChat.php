<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 群发信息
    Update    : 
-->

<?php 
    echo header("Content-Type:text/html;charset=utf-8");   //保证中文输出
    session_start();  //开启session

    /* *****获取消息内容和发送的班级***** */
    $content  = $_REQUEST['content'];
    $class_id = $_REQUEST['class_id']; 
    $tempClassId = (int)$class_id; 
    //字符串班级号转化为整数 
    $length  = mb_strlen($content,'UTF8');  
    //统计内容字数的变量
    $tempUserId = (int)$_SESSION['userId']; 
    //字符串教师号转化为整数
    
    
    /* *****校验消息内容的长度*****  */
    if($length >= 0 && $length <= 140) {   
    	require("conn.php");      //连接数据库

        /* *****先查询该班级学生再循环遍历发送***** */
    	$sql_1 = "select stu_id 
                  from student 
                  where class_id = $tempClassId;";
    	$res   = mysql_query($sql_1);
    	while($row = mysql_fetch_array($res)) {
    		$sql_2 = "insert into tchMessage values (
    		        null,
    		        CURRENT_TIMESTAMP,
    		        '".$content."',
    		        $tempUserId,
    		        $row[0],
    		        0,
    		        0,
                    0
    		        )";
    		mysql_query($sql_2);
    	}
    	echo "<script>";
    	echo "alert('群发成功！');";
    	echo "window.history.back();";
    	echo "</script>";

    } 
    else {
    	echo "<script>";
    	echo "alert('群发失败,内容字数超过限制！');";
    	echo "window.history.back();";
    	echo "</script>";
    }

 ?>