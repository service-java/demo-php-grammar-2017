<?php
# @Author: 骆金参
# @Date:   2017-02-27T21:23:17+08:00
# @Email:  1095947440@qq.com
# @Filename: cookie.php
# @Last modified by:   骆金参
# @Last modified time: 2017-04-03T01:09:02+08:00


header('content-type:text/html;charset=utf-8');

// setcookie('city','北京市'); //未指定过期时间，在会话结束时过期
setcookie('city', '北京市', time()+1800); //半小时后过期 60*30 = 1800
// setcookie('city','',time()-1); //立即过期/删除

//判断COOKIE中是否存在city数据
if(isset($_COOKIE['city'])){
	$city = $_COOKIE['city'];  //从COOKIE中获取City数据
	echo $city;
} else{
	echo "nothing";
}
