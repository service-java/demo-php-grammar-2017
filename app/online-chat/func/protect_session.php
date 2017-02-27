<!-- 
	Author    :骆金参(Luo_0412)
	BuildDate :2016-5-7
	Version   :1.0
	Function  :Qmen' 访问保护 
	Update    : 
-->


<?php 
    echo header("Content-Type:text/html;charset=utf-8");  //保证中文输出
    session_start();
    if(!isset($_SESSION['userId'])) {
        // die("为保护您的账号安全,请先<a href='login.php'>登录</a>");  //单引号
        echo "<script>";
        echo "alert('为保护您的账号安全,请先登录！');";
        echo "window.location = 'login.php';";
        echo "</script>";
    }
    else {
        $_SESSION["page"] = "index";
    }
 ?> 