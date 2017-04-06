<?php
	include "include/Menu.php";
	$menu = new Menu();
	@$menuname = stripslashes(trim($_POST['menuname']));//菜单名称
	$menuname=mysql_real_escape_string(strip_tags($menuname)); //过滤HTML标签，并转义特殊字符
	@$parentid = $_POST['parentid'];
	
	if ($menuname <> '')
	{
		if ($parentid > 0)
		{
			@$sql = "select max(menu_order) as menuorder,menu_layer from menu where menu_id = " . $parentid;
			@$result = mysql_query($sql);
			if ($result){
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				$sql = 'insert into menu (menu_name,parent_id,menu_layer,menu_order) values ("'. $menuname .'",'. $parentid .',' . ($row['menu_layer'] + 1) .', ' . ($row['menuorder'] + 1) . ')';
			}
		}else
		{
			$sql = 'insert into menu (menu_name,parent_id,menu_layer,menu_order) values ("'. $menuname .'",0,0, 0)';
		}
		mysql_query($sql);
		header("Location: index.php"); 
		exit;
		
		
		
	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>增加菜单项</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

</head>
<body>
    <div id="header">
       
    </div>
    <div id="main" style="width:1060px">
       <form action="" method="post" >
		<table >
       	  <tr><td width="80px">上级菜单</td>
			<td>
				<?php
					//$menu = new Menu();
					echo "<select name='parentid'>";
					echo "<option value='0'>请选择</option>";
					$menu->getall_convert_option();
					echo "</select>";
				?>
			</td>
		</tr>
		<tr><td>菜单名称</td>
			<td>
				<input type="text" name="menuname" width="50px">
			</td>
		</tr>
		<tr><td colspan="2"> <input name="提交" value="提交" type="submit" /> </td></tr>
       </table>
       </form>
    </div>
    <div id="footer">
        <p>Powered by ZIOER&nbsp;<a href="http://www.zioer.com">www.zioer.com</a></p>
    </div>
</body>
</html>
