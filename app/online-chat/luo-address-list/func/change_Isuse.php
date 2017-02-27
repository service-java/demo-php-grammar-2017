<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :软删除
    Update    : 
-->

<?php 
    session_start();
	require("conn.php");
    $id = $_REQUEST['id'];
    echo $id;
	$sql = "update student set isuse = 0  
	        where student_Id = '".$id."';";
    mysql_query($sql);
    mysql_close();
    echo("<script>window.location='../index.php';</script>");
 ?>