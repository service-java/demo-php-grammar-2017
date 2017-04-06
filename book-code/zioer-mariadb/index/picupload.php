<?php
	include "header.php";
?>
<script language="javascript">
function AddRow()
{
	var eNewRow = tblData.insertRow();
	for (var i=0;i<1;i++)
	{
		var eNewCell = eNewRow.insertCell();
		eNewCell.innerHTML = "<tr><td><input type='file' name='picfile[]' size='50'/></td></tr>";
	}
}
</script>     
    <div class="sidebar-nav">
    	<?php
			
			$menu = new Menu();

			$menu->getall();
		?>
    </div>
    

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">上传图片</h1>
        </div>
        <div class="btn-toolbar">
		</div>
        
        <div class="container-fluid">
            <div class="row-fluid">
				<form name="myform" method="post" action="picuploadsave.php" enctype="multipart/form-data" >
					<table id="tblData" width="400" border="0">
					<tr><td>多文件上传列表
					<input type="button" name="addfile" onclick="AddRow()" value="添加图片" /></td></tr>
					<!-- picfile[]必须是一个数组-->
					<tr><td><input type="file" name="picfile[]" size="50" /></td></tr>
					</table>
					<input type="submit" name="submitfile" value="提交文件" />
				</form> 
<?php
	include "footer.php";
?>               