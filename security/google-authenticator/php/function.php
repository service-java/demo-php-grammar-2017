<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:24+08:00
# @Email:  1095947440@qq.com
# @Filename: function.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-17T23:24:57+08:00


//页面重定向
function page_redirect($back,$path,$info)
{
	$str="<script>";
	//输出提示信息，为空不输出

	if (!empty($info))
		$str .= "alert('".$info."');";
	//根据页面重定向类型，执行不同跳转
	if ($back)
		//回退
		$str .= "window.history.back();";
	else
	{
		//重定向到指定页面
		if (!empty($path))
			$str .= "window.location='" .$path. "';";
	}
	$str .= "</script>";
	echo $str;
}

?>
