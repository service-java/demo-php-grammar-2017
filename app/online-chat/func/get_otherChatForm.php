<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 另一种聊天的方式
    Update    : 
-->

<?php 
    
    session_start();  //开启session
    $_SESSION['hasOtherChat'] = 'yes';
    /*教师身份*/
    if($_SESSION['userKind'] == 1 ) {
    	$_SESSION['chatId'] = (int)$_REQUEST['stu_id'];
    }
    /*学生身份*/
    else {
        $_SESSION['chatId'] = (int)$_REQUEST['tch_id'];
        var_dump($_SESSION['chatId']);
    }

    echo "<script>";
    echo "window.location = '../perChat.php';";
    echo "</script>";

    
 ?>