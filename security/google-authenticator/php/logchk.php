<?php  
	include("function.php");
	//获取表单元素
	$user=$_GET["username"]; 
	$password=$_GET["userpwd"];
	$pwd2=$_GET["userpwd2"];
	//用户名或密码不能为空，为空则返回登录首页	
	//去左右空格trim
	//判空函数empty
	if (empty(trim($user)) || empty(trim($password)) || empty(trim($pwd2)))
	{
		page_redirect(true,"","用户名或密码或验证码不能为空");

	}
	else
	{
		 include("conn.php");
		 $sql = "SELECT pwd,secret FROM user WHERE name = '$user'";
		 //执行数据库
		 $res = mysqli_query($conn,$sql);
		 //获取当前行记录
		 $rows = mysqli_fetch_array($res,MYSQLI_ASSOC);
		 if ($rows)
		 {
		 	if ($rows["pwd"] == hash('sha512', $password))
		 	{
		 		require_once '../GoogleAuthenticator/PHPGangsta/GoogleAuthenticator.php';
				$ga = new PHPGangsta_GoogleAuthenticator();

				$checkResult = $ga->verifyCode($rows["secret"], $pwd2, 2);    // 2 = 2*30sec clock tolerance

				if ($checkResult) {
				    page_redirect(true,"","登录成功");
				} else {
				    page_redirect(true,"","验证码错误");
				}
				
		 	}
		 	else
		 	{
		 		page_redirect(true,"","密码错误");
		 	}
		 }
		 else
		 {
			   page_redirect(true,"","用户名不存在");
		 }
	}
?>