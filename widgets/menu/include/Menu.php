<?php
class Menu{                        // 定义Menu类	
	
	private $con;
	/**
	*构造类
	*/
	public function __construct() {
	//初始化:连接MariaDB数据库
		$this->con = mysql_connect("localhost","root","root");
		if (!$this->con)
		{
		  die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("test", $this->con); 
	}
	
	/**
	*得到第一层
	*/
	function getfirst()
	{
	  $sql = "SELECT * FROM menu where parent_id = 0";	
	  $result = mysql_query($sql);

	  while($row = mysql_fetch_array($result))
	  {
		  echo $row['menu_id'] . " " . $row['menu_name'];
		  echo "<br />";
	  }
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
		  echo $row['menu_id'] . " " . $row['menu_name'];
		  echo "<br />";
		  
		  if ( $this->checkChild($row['menu_id']) > 0)
		  {
			  $this->getChildren($row['menu_id']);
		  };
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
		  for($i = 0; $i<$row['menu_layer'];$i++)
		  {
			   echo "&nbsp;&nbsp;";
		  }
		  echo "--> " . $row['menu_id'] . " " . $row['menu_name'];
		  echo "<br />";
		  if ( $this->checkChild($row['menu_id']) > 0)
		  {
			  $this->getChildren($row['menu_id']);
		  };
		  
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
		mysql_close($this->con);
	}
	
	
	 
	function getall_convert_option()
	{
	  $sql = "SELECT * FROM menu where parent_id = 0";	
	  $result = mysql_query($sql);

	  while($row = mysql_fetch_array($result))
	  {
		  echo '<option value="'.$row['menu_id'].'" >' .$row['menu_name']. '</option>' ;
		  
		  if ( $this->checkChild($row['menu_id']) > 0)
		  {
			  $this->getChildren_convert_option($row['menu_id']);
		  };
	  }
	}
	
	
	function getChildren_convert_option($id)
	{
		$sql = "SELECT * FROM menu where parent_id = " . $id;
		$result = mysql_query($sql);
		  
		while($row = mysql_fetch_array($result))
		{
		 
		  echo '<option value="'.$row['menu_id'].'" >' ;
		  for($i = 0; $i<$row['menu_layer'];$i++)
		  {
			   echo "--";
		  }
		  echo $row['menu_name']. '</option>' ;
		  if ( $this->checkChild($row['menu_id']) > 0)
		  {
			  $this->getChildren_convert_option($row['menu_id']);
		  };
		  
		}
	}
}
