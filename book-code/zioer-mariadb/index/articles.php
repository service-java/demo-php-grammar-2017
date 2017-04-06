<?php
	include "header.php";
	$article = new Article();
	@$action = stripslashes(trim($_GET['action']));//action
	
	if ($action == "del")
	{
		$id = stripslashes(trim($_GET['id']));
		
		$userid = $_SESSION["userid"] ;
		$ret = $article->delArticle($id,$userid);
		if ($ret == 1)
		{
			echo "<script>alert('删除成功!');</script>";
		}else
		{
			echo "<script>alert('删除失败！');</script>";
		}
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
            
            <h1 class="page-title">文章列表</h1>
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
					  <th>标题</th>
					  <th>创建时间</th>
					  <th >操作</th>
					</tr>
				  </thead>
				  <tbody>
					<?php 
						@$Page_size=10; 
						@$page=$_GET['page']; //获得当前页
						if (!isset($page)) {
						 $page=1;
						}
						$start =($page-1)*$Page_size;
						
						$result = $article->listArticle($_SESSION["userid"], $start, $Page_size );
						$rowcount = $article->getAllCount();
						$totalPage=ceil($rowcount/$Page_size); //总页数
						while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
						{
							@$start = strtotime($row['starttime']);
							echo "<tr>";
							echo "<td>" . $row['article_id'] . "</td>";
							echo "<td>" . $row['article_name'] . "</td>";
							echo "<td>" . $row['createtime'] . "</td>";
							echo '<td><button class="btn" onClick="editarticle(' . $row['article_id'] . ');">修改</button>&nbsp;';
							echo '<button class="btn" onClick="delarticle(' . $row['article_id'] . ');">删除</button></td>';
							echo "</tr>";						
						}
						
					?>
				  </tbody>
				</table>
				</div>	
				<div class="pagination">
					<ul>
						<?php
						////显示页
						if ($page != 1) { 
						?>
						<li><a href="articles.php?page=<?php echo $page - 1;?>">上一页</a> </li>
						<?php
						}
							for ($i=1;$i<=$totalPage;$i++) 
							{  
						?>
							<li><a href="articles.php?page=<?php echo $i;?>"><?php echo $i ;?></a></li>
						<?php
							}
						if ($page<$totalPage) { 
						?>
						<li><a href="articles.php?page=<?php echo $page + 1;?>">下一页</a></li>
						<?php
						} 
						?>
					</ul>
				</div>
<script type="text/javascript">
	function editarticle(obj)
	{	
		window.location='articleedit.php?id=' + obj;
	}
	function delarticle(obj)
	{
		window.location='articles.php?action=del&id=' + obj;
	}
</script>				
<?php
	include "footer.php";
?>               