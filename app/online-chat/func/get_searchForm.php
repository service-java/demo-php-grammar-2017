<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 私信搜索区 
    Update    : 
-->

<?php 
	session_start(); //开启session

	/* *****获取查询条件类型***** */
	$isCollected = (int)$_REQUEST['isCollected'];
	$from = (int)$_REQUEST['from'];
	$timeLimit = (int)$_REQUEST['timeLimit'];

    /*获取内容存入session*/
	$_SESSION['hasFind'] = 'yes';
	$_SESSION['isCollected'] = $isCollected;
	$_SESSION['from'] = $from;
	$_SESSION['timeLimit'] = $timeLimit;

    echo "<script>";
    echo "window.history.back();";
    echo "</script>";
	
 ?>