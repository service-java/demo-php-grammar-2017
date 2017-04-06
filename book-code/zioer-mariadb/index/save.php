<?php
session_start();
include "../include/Agenda.php";

$agenda = new Agenda();

$action = $_GET['action'];

if($action=='add'){
	@$title = stripslashes(trim($_POST['eventtitle']));//事件标题
	$title=mysql_real_escape_string(strip_tags($title),$agenda->getconn() ); //过滤HTML标签，并转义特殊字符
	
	@$content = stripslashes(trim($_POST['eventcontent']));//事件内容
	$content=mysql_real_escape_string(strip_tags($content),$agenda->getconn()); //过滤HTML标签，并转义特殊字符
	
	@$isallday = $_POST['isallday'];//是否是全天事件
	@$isend = $_POST['isend'];//是否有结束时间

	@$startdate = trim($_POST['startdate']);//开始日期
	@$enddate = trim($_POST['enddate']);//结束日期

	@$s_time = $_POST['s_hour'].':'.$_POST['s_minute'].':00';//开始时间
	$e_time = $_POST['e_hour'].':'.$_POST['e_minute'].':00';//结束时间
	
	if($isallday==1 && $isend==1){
		$starttime = strtotime($startdate);
		@$endtime = strtotime($enddate);
	}elseif($isallday==1 && $isend==""){
		$starttime = strtotime($startdate);
		@$endtime = null;
	}elseif($isallday=="" && $isend==1){
		$starttime = strtotime($startdate.' '.$s_time);
		@$endtime = strtotime($enddate.' '.$e_time);
	}else{
		$starttime = strtotime($startdate.' '.$s_time);
		@$endtime = null;
	}
	
	$starttime = date ("Y-m-d H:i:s",$starttime) ;
	$endtime = date ("Y-m-d H:i:s",$endtime) ;

	$isallday = $isallday?1:0;
	$isend = $isend?1:0;

	$userid = $_SESSION["userid"] ;
	$result = $agenda->saveagenda($title,$starttime,$endtime,$isallday,$isend,$content,$userid);
	if($result>0)
	{
		echo "1";
	}else{
		echo '保存事件失败！';
	}
//add结束
}elseif($action=="edit"){
	$id = intval($_POST['id']);
	if($id==0){
		echo '事件不存在！';
		exit;	
	}
	@$title = stripslashes(trim($_POST['eventtitle']));//事件标题
	$title=mysql_real_escape_string(strip_tags($title),$agenda->getconn() ); //过滤HTML标签，并转义特殊字符
	
	@$content = stripslashes(trim($_POST['eventcontent']));//事件内容
	$content=mysql_real_escape_string(strip_tags($content),$agenda->getconn() ); //过滤HTML标签，并转义特殊字符
	
	@$isallday = $_POST['isallday'];//是否是全天事件
	@$isend = $_POST['isend'];//是否有结束时间

	@$startdate = trim($_POST['startdate']);//开始日期
	@$enddate = trim($_POST['enddate']);//结束日期

	@$s_time = $_POST['s_hour'].':'.$_POST['s_minute'].':00';//开始时间
	@$e_time = $_POST['e_hour'].':'.$_POST['e_minute'].':00';//结束时间

	if($isallday==1 && $isend==1){
		@$starttime = strtotime($startdate);
		@$endtime = strtotime($enddate);
	}elseif($isallday==1 && $isend==""){
		@$starttime = strtotime($startdate);
		@$endtime = 0;
	}elseif($isallday=="" && $isend==1){
		@$starttime = strtotime($startdate.' '.$s_time);
		@$endtime = strtotime($enddate.' '.$e_time);
	}else{
		@$starttime = strtotime($startdate.' '.$s_time);
		@$endtime = 0;
	}

	$starttime = date ("Y-m-d H:i:s",$starttime) ;
	$endtime = date ("Y-m-d H:i:s",$endtime) ;

	$isallday = $isallday?1:0;
	$isend = $isend?1:0;

	$result = $agenda->updateagenda($title,$starttime,$endtime,$isallday,$isend,$content,$id);
	if($result){
		echo '1';
	}else{
		echo '保存错误！';	
	}
}elseif($action=="del"){
	$id = intval($_POST['id']);
	if($id>0){
		$ret = $agenda->delagenda($id);
		if($ret==1){
			echo '1';
		}else{
			echo '删除错误！';	
		}
	}else{
		echo '事件不存在！';
	}
}else{
	
}
?>