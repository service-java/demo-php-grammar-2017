<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :搜索关键词 
    Update    : 
-->

<?php 
	session_start();
    echo header("Content-Type:text/html;charset=utf-8");  //保证中文输出
	$keyword   = $_REQUEST['keyword'];
	$choice = $_REQUEST['option'];
	$_SESSION["hasFind"] = "yes";
    $_SESSION['keyword'] = $keyword;
    $_SESSION['choice']  = $choice;
	echo "<script>";
	echo "window.history.back()";
	echo "</script>"; 
 ?>