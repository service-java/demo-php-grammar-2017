<?php
	include "header.php";
?>
    
    <div class="sidebar-nav">
    	<?php
			
			$menu = new Menu();

			$menu->getall();
		?>
    </div>
    

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Users</h1>
        </div>
        
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">Users</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<?php
	include "footer.php";
?>               