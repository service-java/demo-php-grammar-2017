<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :加载图片文件
    Update    : 
-->


<?php
    session_start();  //开启会话
    echo header("Content-Type:text/html;charset=utf-8");  //保证中文输出
    
    $bool = ($_FILES["file"]["type"] == "image/gif"
    	  || $_FILES["file"]["type"] == "image/pjpeg"
    	  || $_FILES["file"]["type"] == "image/jpeg"
    	  || $_FILES["file"]["type"] == "image/png" );   //文件类型判断
    if(!$bool) {
    	die("类型不对<a href='javascript:window.history.back();'>返回</a>");
    }
    $bool = $_FILES["file"]["size"] < 10000000;    //文件大小判断
    if(!$bool) {
    	die("大小不对<a href='javascript:window.history.back();'>返回</a>");
    }

    
    if($_FILES['file']['error'] > 0) {  //文件上传遇错后停止执行
    	die("Return Code:".$_FILES["file"]["error"]."<br />");
    }
  
    $today = date("YmdHits"); //取上传时间为文件名
    $fileArray = explode(".",$_FILES["file"]["name"]);  //文件名按照"."分成两部分存到数组
    $filename=$today.".".$fileArray[1];  //重命名上传文件
    move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/".$filename); //移动文件

    $filePath = "upload/$filename";
    $_SESSION["userimage"]= $filePath;  //保存文件路径

    if($_SESSION['userkind'] != '1') {  //校友  上传照片保存路径image
        require("conn.php");
        $sql = "update student
                set image = '".$_SESSION["userimage"]."'
                where student_Name = '".$_SESSION['username']."';";
        mysql_query($sql);
    }
    else {
        if(isset($_SESSION['hasEdit'])) {
            require("conn.php");
            $sql = "update student
                    set image = '".$_SESSION["userimage"]."'
                    where student_Id = '".$_SESSION['temp']."';";
            mysql_query($sql);

        }

    }

    echo "<script>";
    echo "alert('图片上传成功！');"; 
    echo "window.history.back()";    //这样跳回，表单信息不会消失
    echo "</script>";
?>
