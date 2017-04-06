<?php
	include "header.php";
	@$id = stripslashes(trim($_GET['id']));//事件标题
	
	$user = new User();
	if ($id > 0)
	{
		$user->delUser($id);
	}
?>
    
    <div class="sidebar-nav">
    	<?php
			
			$menu = new Menu();

			$menu->getall();
		?>
    </div>
    

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">用户管理</h1>
        </div>
        <div class="btn-toolbar">
		</div>
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="well">
				<table class="table">
				  <thead>
					<tr>
					  <th>#</th>
					  <th>用户名</th>
					  <th>注册时间</th>
					  <th >操作</th>
					</tr>
				  </thead>
				  <tbody>
					<?php 
						
						$result = $user->listUser();
						while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
						{
							@$start = strtotime($row['starttime']);
							echo "<tr>";
							echo "<td>" . $row['user_id'] . "</td>";
							echo "<td>" . $row['user_name'] . "</td>";
							echo "<td>" . $row['createtime'] . "</td>";
							echo '<td><button class="btn" onClick="deluser(' . $row['user_id'] . ');">删除</button></td>';
							echo "</tr>";						
						}
					?>
				  </tbody>
				</table>
				</div>
              
<script type="text/javascript">
	function deluser(obj)
	{
		window.location='users.php?id=' + obj;
	}
</script>			  
<?php
	include "footer.php";
?>               