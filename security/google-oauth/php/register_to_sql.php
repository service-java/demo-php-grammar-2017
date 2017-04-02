<?php   
	//连接数据库
	include("conn.php");
	include("function.php");
	session_start();
	$name = $_POST["username"];
	$pwd = $_POST['userpwd'];

	$pwd = hash('sha512', $pwd);

	require_once '../GoogleAuthenticator/PHPGangsta/GoogleAuthenticator.php';
	$ga = new PHPGangsta_GoogleAuthenticator();
	$secret = $ga->createSecret();
	//插入记录
	$sql = "INSERT INTO user (name,secret,pwd) VALUES ('$name','$secret', '$pwd')";
	$res = mysqli_query($conn,$sql);
	mysqli_close($conn);
	if ($res == TRUE)
	{
		$_SESSION['name'] = $name;
		page_redirect(false,"pr.php","");
	}
	else
	{
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
?>