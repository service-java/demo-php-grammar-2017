<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-5
    Version   :1.0
    Function  :校友通讯录  登录检验
-->

<?php
    session_start();
    $username = $_REQUEST["userName"];
    $userpwd  = $_REQUEST["userPwd"];
    @$userkind = $_REQUEST["hello"];
    $_SESSION[$username] = $userpwd;
    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>校友通讯录  注册</title>
</head>
<body>




</body>
</html>