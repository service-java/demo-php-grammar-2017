<?php

include_once 'config.php';



class Menu{                        // 定义Menu类

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
		mysql_select_db($GLOBALS['db_name'], $this->con);

		$sql = "set names utf8";  //中文编码
    mysql_query($sql);
    date_default_timezone_set('Asia/Shanghai');
	}
	/**
	*得到所有层
	*/
	function getall()
	{
	  $sql = "SELECT * FROM menu where parent_id = 0";
	  $result = mysql_query($sql);

	  while($row = mysql_fetch_array($result))
	  {

		  if ( $this->checkChild($row['menu_id']) > 0)
		  {

			  echo '<a href="#' . $row['menu_id'] . '" class="nav-header collapsed" data-toggle="collapse"><i class="icon-dashboard"></i>' . $row['menu_name'] . '<i class="icon-chevron-up"></i></a>';
			  echo '<ul id="' . $row['menu_id'] . '" class="nav nav-list collapse">';
			  $this->getChildren($row['menu_id']);
			  echo '</ul>';
		  }else
		  {
			  echo "<a href='". $row['menu_url'] ."' class='nav-header'><i class='icon-dashboard'></i>" . $row['menu_name'] . "</a>";
		  }
	  }
	}
	/**
	*得到$id的所有子层
	*/
	function getChildren($id)
	{
		$sql = "SELECT * FROM menu where parent_id = " . $id;
		$result = mysql_query($sql);

		while($row = mysql_fetch_array($result))
		{

			echo '<li ><a href="'. $row['menu_url'] .'">' . $row['menu_name'] . '</a></li>';
		}
	}

    /**
	*判断$id是否有子层
	*/
	 function checkChild($id)
	 {
		 $sql = "SELECT count(*) as count FROM menu where parent_id = " . $id ;
		 $result = mysql_query($sql);
		 if($result)
		 {
			 $row = mysql_fetch_array($result);
			 return $row['count'];
		 }
		 return 0;

	 }

	function __destruct() {
		//析构函数:释放连接

	}

}
