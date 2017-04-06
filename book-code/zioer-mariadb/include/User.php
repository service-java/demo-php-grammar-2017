<?php

include_once 'config.php';


class User{                        // 定义User类


	private $con;
	/**
	*构造类
	*/
	public function __construct() {

	//初始化:连接MariaDB数据库
		@$this->con = mysql_connect($GLOBALS['db'],$GLOBALS['db_user'],$GLOBALS['db_pass']);
		if (!$this->con)
		{
		  die('Could not connect: ' . mysql_error());
		}
		@mysql_select_db($GLOBALS['db_name'], $this->con);
	}


	function addUser($name,$pass)
	{
		$sql = "insert into users (user_name,user_password,createtime) values ('" . $name . "',md5('" . $pass . "'),now() ) ";
	    $result = mysql_query($sql);
		if(mysql_insert_id()>0)
		{
			return 1;
		}else{
			return 0;
		}
	}

	function checkUser($name)
	{
		$sql = "select count(*) as c from users where user_name='". $name ."' ";
		$result = mysql_query($sql);

		if ($result)
		{
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$count = $row['c'];
		}else
		{
			$count = 0;
		}

		return $count;
	}

	function loginUser($name,$password)
	{
		$sql = "select user_password,user_id from users where user_name='". $name ."' ";
		$result = mysql_query($sql);
		if ($result)
		{
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$user_password = $row['user_password'];
			if ($user_password == md5($password))
			{
				$_SESSION["username"]=$name;
				$_SESSION["userid"]=$row['user_id'];
				return 1;
			}else
			{
				return 0;
			}
		}else
		{
			return 0;
		}
		return 0;
	}

	function listUser()
	{
		$sql = "select * from users";
		$result = mysql_query($sql);
		return $result;
	}

	function delUser($id)
	{
		$sql = "delete from users where user_id = " . $id;
		$result = mysql_query($sql);
		return $result;
	}


	function __destruct() {
		//析构函数:释放连接
		mysql_close($this->con);
	}


}
