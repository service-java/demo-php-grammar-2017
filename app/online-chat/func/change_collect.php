<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 多次点击切换收藏状态
    Update    : 
-->

<?php 
    session_start();  //开启session
	require("conn.php");     //连接数据库
	$id = (int)$_REQUEST['id'];
	var_dump($id);

	/*教师身份*/
	if($_SESSION['userKind'] == 1) {
        $sql = "select isCollected
                from   stuMessage
                where  message_no = $id";
        $res = mysql_query($sql);
        $row = mysql_fetch_array($res);
        if($row[0] == 0) {
        	$sql = "update stuMessage
        	        set    isCollected = 1
        	        where  message_no = $id";
        	mysql_query($sql);
        }
        else {
            $sql = "update stuMessage
                    set    isCollected = 0
                    where  message_no = $id";
            mysql_query($sql);
        }
	}

	/*学生身份*/
	else if($_SESSION['userKind'] == 0) {
        $sql = "select isCollected
                from   tchMessage
                where  message_no = $id";
        $res = mysql_query($sql);
        $row = mysql_fetch_array($res);
        if($row[0] == 0) {
        	$sql = "update tchMessage
        	        set    isCollected = 1
        	        where  message_no = $id";
        	mysql_query($sql);
        }
        else {
            $sql = "update tchMessage
                    set    isCollected = 0
                    where  message_no = $id";
            mysql_query($sql);
        }
	}

	echo "<script>";
	echo "window.history.back();";
	echo "</script>";


 ?>
