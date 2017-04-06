<?php
	include "include/Menu.php";
	$menu = new Menu();
	@$parentid = $_POST['parentid'];
	if ($parentid > 0)
	{	
		if ( $menu->checkChild($parentid) == 0 )
		{
			@$sql = "delete from menu where menu_id = " . $parentid;
			mysql_query($sql);
			mysql_query($sql);
			header("Location: index.php"); 
		}else
		{
			echo"<script>alert('该菜单下有子菜单,不能删除')</script>";
		}
	}				
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>删除菜单项</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

</head>
<body>
    <div id="header">
       
    </div>
    <div id="main" style="width:1060px">
       <form action="" method="post" >
		<table >
       	  <tr><td width="80px">菜单项</td>
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
		
		<tr><td colspan="2"> <input name="提交" value="删除" type="submit" /> </td></tr>
       </table>
       </form>
    </div>
    <div id="footer">
        <p>Powered by ZIOER&nbsp;<a href="http://www.zioer.com">www.zioer.com</a></p>
    </div>
</body>
</html>
