<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :获取校友的编辑信息 
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
    $sql = "select student_Id
            from  student
            where student_Name = '".$_SESSION['username']."';";
    
    $res = mysql_query($sql);
    $row = mysql_fetch_array($res);

    // $sql = "update student
    //         set student_Name = '".$student_Name."',
    //         set real_Name    = '$real_Name',
    //         set mobile       =    $mobile,
    //         set card_No      =    $card_No,
    //         set  business     = '".$business."',
    //         set  address      = '".$address."',
    //         set  enter_Year   =    $enter_Year,
    //         set  class_Id     =    $class_Id,
    //         where student_Id =  $row[0];";

    $sql = "update student
            set student_Name = '".$student_Name."',
             real_Name    = '".$real_Name."',
             mobile       =    $mobile,
             card_No      =    $card_No,
              business     = '".$business."',
              address      = '".$address."',
              enter_Year   =    $enter_Year,
              class_Id     =    $class_Id
            where student_Id =  $row[0];";
      
    mysql_query($sql);
    $_SESSION['username'] = $student_Name;



	echo "<script>";
    echo "alert('修改成功！');"; 
	echo "window.history.back()";    //这样跳回，表单信息不会消失
	echo "</script>";


 ?>