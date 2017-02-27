<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :新增校友
    Update    : 
-->

<?php 
    echo header("Content-Type:text/html;charset=utf-8");  //保证中文输出
    @$student_Name = $_REQUEST['student_Name'];
    @$real_Name    = $_REQUEST['real_Name'];
    @$mobile       = $_REQUEST['mobile'];
    @$card_No      = $_REQUEST['card_No'];
    @$business     = $_REQUEST['business'];
    @$address      = $_REQUEST['address'];
    @$enter_Year   = $_REQUEST['enter_Year'];
    @$class_Id     = $_REQUEST['class_Id'];
    
    session_start();
    require("conn.php");
    @$sql = "insert into student values (
            null,
            '".$student_Name."',
            '123',
            '".$real_Name."',
            $card_No,
            '".$business."',
            $enter_Year,
            $class_Id,
            $mobile,
            '".$address."',
            null,
            '".$_SESSION['userimage']."',
            1
           );";


	@mysql_query($sql);
    unset($_SESSION['userimage']);

	echo "<script>";
    echo "alert('新增校友成功！');";
	echo "window.location='../add.php';";    //这样跳回，表单信息不会消失
	echo "</script>";





 ?>