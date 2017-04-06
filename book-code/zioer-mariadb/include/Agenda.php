<?php

include_once 'config.php';

class Agenda{                        // 定义Agenda类

	private $con;
	/**
	*构造类
	*/

	public function getconn()
	{
		return $this->con;
	}
	public function __construct() {

	//初始化:连接MariaDB数据库
		$this->con = @mysql_connect($GLOBALS['db'],$GLOBALS['db_user'],$GLOBALS['db_pass']);
		if (!$this->con)
		{
		  die('Could not connect: ' . mysql_error());
		}
		mysql_select_db($GLOBALS['db_name'], $this->con);
	}

	function getagendabyUser($userid)
	{
		@$sql = "select * from `agenda` where user_id = " . $userid;
		@$result = mysql_query($sql);
		return $result;
	}

	function getOneagendabyID($id)
	{
		@$sql = "select * from `agenda` where id='$id'";
		@$result = mysql_query($sql);
		return $result;
	}

	function saveagenda($title,$starttime,$endtime,$isallday,$isend,$content,$userid)
	{
		@$sql = "insert into `agenda` (`title`,`starttime`,`endtime`,`allday`,`end`,`content`,`user_id`) values ('$title','$starttime','$endtime','$isallday','$isend','$content','$userid')";
		$result = mysql_query($sql);
		$ret = mysql_insert_id();
		return $ret;
	}

	function updateagenda($title,$starttime,$endtime,$isallday,$isend,$content,$id)
	{
		@$sql = "update `agenda` set `title`='$title',`content`='$content',`starttime`='$starttime',`endtime`='$endtime',`allday`='$isallday',`end`='$isend' where `id`='$id'";

		$result = mysql_query($sql);
		return $result;
	}

function delagenda($id)
	{
		@$sql = "delete from `agenda` where `id`='$id'" ;
		$result = mysql_query($sql);
		$ret = mysql_affected_rows();
		return $ret;
	}

	function __destruct() {
		//析构函数:释放连接
		mysql_close($this->con);
	}

}
