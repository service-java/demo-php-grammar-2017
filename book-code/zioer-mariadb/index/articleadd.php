<?php
	include "header.php";
	@$action = stripslashes(trim($_POST['action']));//action
	if ($action == "save")
	{
		$title = stripslashes(trim($_POST['title']));//标题
		$content = stripslashes(trim($_POST['editor']));//内容
		
		$article = new Article();
		$userid = $_SESSION["userid"] ;
		$ret = $article->addArticle($title,$content,$userid);
		if ($ret == 1)
		{
			echo "<script>alert('添加成功!');</script>";
		}else
		{
			echo "<script>alert('添加失败！');</script>";
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
            
            <h1 class="page-title">新增文章</h1>
        </div>
        <div class="btn-toolbar">
		</div>
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="well">
					<form id="tab"  method="post">
						<label>标题</label>
						<input type="text" name="title" value="" class="input-xlarge">
						<label>文章内容</label>
						<textarea  name="editor"  id="editor" rows="3" class="input-xlarge">
						</textarea><br>
						<input type="text" name="action" style="display:none" value="save" class="input-xlarge">
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