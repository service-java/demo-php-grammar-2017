<?php
	include "include/Menu.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>浏览菜单项</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

</head>
<body>
	<div id="header">
       
    </div>
    <div id="main" style="width:1060px">
		<?php
			
			$menu = new Menu();

			$menu->getall();
		?>
		<hr>
		<input type="button" name="新增" value="新增" onClick="window.location='add.php'">
		&nbsp;
		<input type="button" name="删除" value="删除" onClick="window.location='del.php'">
		
       
	</div>
	<div id="footer">
        <p>Powered by ZIOER&nbsp;<a href="http://www.zioer.com">www.zioer.com</a></p>
    </div>
</body>
</html>