<?php

include_once 'config.php';


class Pic{                        // 定义Pic类


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


	function addPic($name,$thumb,$path,$userid)
	{
		$sql = "insert into pics (pic_name,thumb,path,createtime,user_id) values ('$name','$thumb','$path',now(),$userid ) ";
	    $result = mysql_query($sql);
		if(mysql_insert_id()>0)
		{
			return 1;
		}else{
			return 0;
		}
	}

	function editPic($id,$title,$thumb,$path,$userid)
	{
		$sql = "update pics set title='$title',thumb='$thumb',path='$path' where pic_id = $id and user_id = $userid ";
	    $result = mysql_query($sql);
		if($result)
		{
			return 1;
		}else{
			return 0;
		}
	}


	function delPic($id,$userid)
	{
		$sql = "delete from pics where  pic_id =  $id and user_id = $userid ";
		$result = mysql_query($sql);

		return $result;
	}

	function getPic($id,$userid)
	{
		$sql = "select * from pics where  pic_id = " . $id . " and user_id = " . $userid;

		$result = mysql_query($sql);

		return $result;
	}

	function listPic($userid,$start,$pagesize)
	{
		$sql = "select SQL_CALC_FOUND_ROWS * from pics where user_id= " . $userid . "   limit $start,$pagesize ";
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

	//生成随机数
	function randomkey($length)
	{
		$pattern='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
		for($i=0;$i<$length;$i++)
		{
		   @$key .= $pattern{mt_rand(0,35)};
		}
		return $key;
	}

	//简单生成缩略图
	function image_create_small($big_img, $width, $height, $small_img)
	{
		$imgage = getimagesize($big_img); //得到原始大图
		switch ($imgage[2]) { // 图像类型判断
		case 1:
			$im = imagecreatefromgif($big_img);
			break;
		case 2:
			$im = imagecreatefromjpeg($big_img);
			break;
		case 3:
			$im = imagecreatefrompng($big_img);
			break;
		}
		$src_width = $imgage[0]; //获取大图宽度
		$src_height = $imgage[1]; //获取大图高度
		$tn = imagecreatetruecolor($width, $height); //创建缩略图
		imagecopyresampled($tn, $im, 0, 0, 0, 0, $width, $height, $src_width, $src_height);
		imagejpeg($tn, $small_img); //输出
	}
 	//析构函数:释放连接
	function __destruct()
	{
		mysql_close($this->con);
	}


}
