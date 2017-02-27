<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen'  获取上传图片
    Update    : 
-->

<?php 
	session_start();  //开启会话
	echo header("Content-Type:text/html;charset=utf-8");  //保证中文输出
	$tempUserId = $_SESSION['userId'];
	
    /* *****图片类型判断***** */
	$bool = ($_FILES["file"]["type"] == "image/gif"
		  || $_FILES["file"]["type"] == "image/pjpeg"
		  || $_FILES["file"]["type"] == "image/jpeg"
		  || $_FILES["file"]["type"] == "image/png" );   
	if(!$bool) {
		die("类型不对<a href='javascript:window.history.back();'>返回</a>");
	}

	/* *****图片大小判断***** */
	$bool = $_FILES["file"]["size"] < 10000000;    
	if(!$bool) {
		die("大小不对<a href='javascript:window.history.back();'>返回</a>");
	}

	/* *****文件上传遇错后停止执行 */
	if($_FILES['file']['error'] > 0) {  
		die("Return Code:".$_FILES["file"]["error"]."<br />");
	}
	
	/* *****取上传时间为文件名重命名，并移动到指定文件夹下面***** */
	$today = date("YmdHits"); 
	$fileArray = explode(".",$_FILES["file"]["name"]);  
	//文件名按照"."分成两部分存到数组
	$filename=$today.".".$fileArray[1];  
	move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/".$filename); 
	//移动文件

	$filePath = "upload/$filename";
	$_SESSION["userimage"]= $filePath;  //保存文件路径

    require("conn.php");
    /*教师身份*/
	if($_SESSION['userKind'] == 1) {  
	    $sql = "update teacher
	            set image = '".$_SESSION["userimage"]."'
	            where tch_id = ".$tempUserId." ;";
	}
	/*学生身份*/
	else {
	    $sql = "update student
	            set image = '".$_SESSION["userimage"]."'
	            where stu_id = ".$tempUserId." ;";
	}
    mysql_query($sql);

	echo "<script>";
	echo "alert('图片上传成功！');"; 
	echo "window.history.back()";    //这样跳回，表单信息不会消失
	echo "</script>";



 ?>