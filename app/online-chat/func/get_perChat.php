<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 私发信息
    Update    : 
-->

<?php 
    echo header("Content-Type:text/html;charset=utf-8");   //保证中文输出
    session_start();  //开启session

    /* *****获取发送方账号和私信内容***** */
    $content  = $_REQUEST['content'];
    $length  = mb_strlen($content,'UTF8');  
    //内容字数
    $tempUserId = (int)$_SESSION['userId']; 
    //字符串用户号转化为整数
    

    /* *****校验私信内容长度*****  */
    if($length >= 0 && $length <= 140) {    

    	require("conn.php");      //连接数据库
        
        /* *****教师身份在数据库插入私信***** */
        if($_SESSION['userKind'] == 1) {  
            $sql = "insert into tchMessage values (
                    null,
                    CURRENT_TIMESTAMP,
                    '".$content."',
                    $tempUserId,
                    ".$_SESSION['chatId'].",
                    0,
                    0,
                    0);";
            mysql_query($sql);
        }
        else {                            //学生身份
            $sql = "insert into stuMessage values (
                    null,
                    CURRENT_TIMESTAMP,
                    '".$content."',
                    $tempUserId,
                    ".$_SESSION['chatId'].",
                    0,
                    0,
                    0);";
            mysql_query($sql);
        }
     
    	echo "<script>";
        echo "window.location = '../perChat.php?id=".$_SESSION['chatId']."';";
    	echo "</script>";

    } 

    else {
    	echo "<script>";
    	echo "alert('发送失败,内容字数超过限制！');";
        echo "window.history.back();";
    	echo "</script>";
    }

 ?>