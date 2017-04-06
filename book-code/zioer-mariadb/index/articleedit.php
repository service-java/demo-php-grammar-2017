<?php
	include "header.php";
	@$id = stripslashes(trim($_GET['id']));//action
	@$action = stripslashes(trim($_POST['action']));//action
	$userid = $_SESSION["userid"] ;
    $article = new Article();	
	
	if ($action == "save")
	{
		$title = stripslashes(trim($_POST['title']));//标题
		$content = stripslashes(trim($_POST['editor']));//内容
		
		$ret = $article->editArticle($title,$content,$id,$userid);
		if ($ret == 1)
		{
			echo "<script>alert('修改成功!');</script>";
			header("Location: articles.php"); 
		}else
		{
			echo "<script>alert('修改失败！');</script>";
		}
	}
	
	$result = $article->getArticle($id,$userid);
	
	if ($result)
	{
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		$title = $row['article_name'];
		$content = $row['article_content'];
		if ($title == "")
		{
			echo "<script>alert('没有该文！');</script>";
			header("Location: articles.php"); 
			exit;
		}
	}else
	{
		echo "<script>alert('没有该文！');</script>";
		header("Location: articles.php"); 
		exit;
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
            
            <h1 class="page-title">修改文章</h1>
        </div>
        <div class="btn-toolbar">
		</div>
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="well">
					<form id="tab"  method="post">
						<label>标题</label>
						<input type="text" name="title" class="input-xlarge" value="<?php echo $title; ?>">
						<label>文章内容</label>
						<textarea  name="editor"  id="editor" rows="3" class="input-xlarge">
						<?php echo $content; ?></textarea><br>
						<input type="text" name="action" style="display:none" value="save" class="input-xlarge">
						<input type="text" name="id" style="display:none" value="<?php echo $id; ?>" class="input-xlarge">
						<button class="btn btn-primary"><i class="icon-save"></i> 保存</button>
					</form>
				</div>
				
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(function()
	{CKEDITOR.replace('editor');
});
</script>
<?php
	include "footer.php";
?>               