<?php
	include "header.php";
	$userid = $_SESSION["userid"] ;
?>   
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
			<?php
			$pic = new Pic();
			$file_nameArray = $_FILES['picfile']['name']; //取得上传文件名称
			$file_tmpArray = $_FILES["picfile"]["tmp_name"];  //临时文件位置

			$newpath="./upload/".date('Ym')."/";	//保存文件路径
			if (!is_dir($newpath))
			{ 
				mkdir($newpath); 
			}

			for ($i=0;$i<count(@$file_nameArray);$i++)
			{ 
				$file_name = $file_nameArray[$i];
				$file_temp = $file_tmpArray[$i];
				$ext = strrpos($file_name, '.');
				$file_name_prio = substr($file_name, 0, $ext);
				$file_name_last = substr($file_name, $ext);
				
				$newfile_name_prio=$newpath.date('Ymd')."_". $pic->randomkey(10);
				$newfile_name = $newfile_name_prio . $file_name_last;
				$newfile_name_thumb=$newfile_name_prio . "_thumb" . $file_name_last;
				if (move_uploaded_file($file_temp,$newfile_name))
				{ 
					echo "<font color=red>".$file_name ."</font> &nbsp;文件上传成功!<br>"; 
					$pic->image_create_small($newfile_name,140,140,$newfile_name_thumb);
					
					$ret = $pic->addPic($file_name,$newfile_name_thumb,$newfile_name,$userid);
					if ($ret == 0){
						echo "数据库保存失败";
					}
				}
				else
				{ 
					echo "文件名:".$file_name."上传失败</br>"; 
				}
				
				
				//echo $newfile_name."<br>";
			}
?>
			<br><br>
			<input type="button" name="" value="返回" onClick="window.location='picupload.php'">
<?php
	include "footer.php";
?>   