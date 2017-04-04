<?php
	session_start();
	$username=$_REQUEST["userName"];

	include("conn.php"); // 连接数据库

	$sql="select * from students where user_name='".$username."'";
	$rs = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn)>0){
		echo "用户名已被注册";
	} else {
		echo "用户名可用";
	}
	mysqli_close($conn);

?>