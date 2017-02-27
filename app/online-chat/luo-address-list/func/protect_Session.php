<!-- 
	Author    :骆金参(Luo_0412)
	BuildDate :2016-5-7
	Version   :1.0
	Function  :访问保护 
	Update    : 
-->


<?php 
    echo header("Content-Type:text/html;charset=utf-8");
    session_start();
    if(!isset($_SESSION['username'])) {
        die("为保护您的账号安全,请先<a href='login.php'>登录</a>");  //单引号
    }
    else {
        $_SESSION["page"] = "index";
    }
 ?> 