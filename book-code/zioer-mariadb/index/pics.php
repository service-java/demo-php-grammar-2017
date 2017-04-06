<?php
	include "header.php";
	$userid = $_SESSION["userid"] ;
	$pic = new Pic();
?>
<link rel="stylesheet" type="text/css" href="css/fancybox.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />   

	<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
	
    <div class="sidebar-nav">
    	<?php
			
			$menu = new Menu();

			$menu->getall();
		?>
    </div>
    

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">图片列表</h1>
        </div>
        
 
        <div class="container-fluid">
            <div class="row-fluid">
                <div>
					<div class="block-body gallery">
						<?php
						@$Page_size=10; 
						@$page=$_GET['page']; //获得当前页
						if (!isset($page)) {
						 $page=1;
						}
						$start =($page-1)*$Page_size;
						
						
						$result = $pic->listpic($_SESSION["userid"], $start, $Page_size );
						
						$rowcount = $pic->getAllCount();
						$totalPage=ceil($rowcount/$Page_size); //总页数
						
						while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
						{
							echo "<a class='fancybox' href='" . $row['path'] . "' data-fancybox-group='gallery' title='". $row['pic_name'] . "'>";
							echo "<img src='". $row['thumb'] ."' class='img-polaroid'>";
							echo "</a>";
												
						}
						?>
						
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="pagination">
					<ul>
						<?php
						////显示页
						if ($page != 1) { 
						?>
						<li><a href="pics.php?page=<?php echo $page - 1;?>">上一页</a> </li>
						<?php
						}
							for ($i=1;$i<=$totalPage;$i++) 
							{  
						?>
							<li><a href="pics.php?page=<?php echo $i;?>"><?php echo $i ;?></a></li>
						<?php
							}
						if ($page<$totalPage) { 
						?>
						<li><a href="pics.php?page=<?php echo $page + 1;?>">下一页</a></li>
						<?php
						} 
						?>
					</ul>
				</div>
<?php
	include "footer.php";
?>               