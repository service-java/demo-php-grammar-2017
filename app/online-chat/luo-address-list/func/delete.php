<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :删除
    Update    : 
-->

<?php
	//引用数据库连接文件
	include("conn.php");
	//引用公共函数文件
	include("functions.php");
	//删除 sql 语句
	$sql="DELETE FROM Persons WHERE LastName='Griffin'";
	//执行删除语句
	mysql_query($sql);
	//删除后重定向页面
	if(mysql_affected_rows()>0){
		page_redirect(0,"list.php","删除成功！ ");
	}
	else{
		page_redirect(0,"list.php","删除失败！ ");
	}
?>