<?php

include_once 'config.php';


class Article{                        // 定义Article类


	private $con;
	/**
	*构造类
	*/
	public function __construct() {

	//初始化:连接MariaDB数据库
		$this->con = @mysql_connect($GLOBALS['db'],$GLOBALS['db_user'],$GLOBALS['db_pass']);
		if (!$this->con)
		{
		  die('Could not connect: ' . mysql_error());
		}
		@mysql_select_db($GLOBALS['db_name'], $this->con);
	}


	function addArticle($title,$content,$userid)
	{
		$sql = "insert into articles (article_name,article_content,createtime,user_id) values ('".$title."','".$content."',now(),".$userid." ) ";
	    $result = mysql_query($sql);
		if(mysql_insert_id()>0)
		{
			return 1;
		}else{
			return 0;
		}
	}

	function editArticle($title,$content,$id,$userid)
	{
		$sql = "update articles set article_name='$title',article_content='$content' where article_id = $id and user_id = $userid ";
	    $result = mysql_query($sql);
		if($result)
		{
			return 1;
		}else{
			return 0;
		}
	}


	function delArticle($id,$userid)
	{
		$sql = "delete from articles where  article_id =  $id and user_id = $userid ";
		$result = mysql_query($sql);

		return $result;
	}

	function getArticle($id,$userid)
	{
		$sql = "select * from articles where  article_id = " . $id . " and user_id = " . $userid;

		$result = mysql_query($sql);

		return $result;
	}

	function listArticle($userid,$start,$pagesize)
	{
		$sql = "select SQL_CALC_FOUND_ROWS * from articles where user_id= " . $userid . "   limit $start,$pagesize ";
		$result = mysql_query($sql);

		return $result;
	}

	function getAllCount()
	{
		$sql = "select FOUND_ROWS() as c";
		$result = mysql_query($sql);

		if ($result)
		{
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			return $row['c'];
		}else
		{
			return 0;
		}
	}


	function __destruct() {
		//析构函数:释放连接
		mysql_close($this->con);
	}


}
