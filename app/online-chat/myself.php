<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 个人设置页 
    Update    : 
-->

<?php 
    require("func/protect_session.php");  //访问保护，注意session已开启
    // var_dump($_SESSION);
 ?>

 <!DOCTYPE html>
 <html lang="zh-CN">
 <head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"> <!--  为了响应式布局 -->
     <title>Qmen'  个人设置页</title>
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">  <!-- 调用bootstrap框架CSS -->
     <style>
         .nav-tabs {
            margin-top: 120px;
         }
     </style>
 </head>
 <body>

     <?php  
         require("common/header.html");   //头部区   
     ?>
   
   <!-- 标签页导航 -->
   <div class="container">
     <ul class="nav nav-tabs">
       <li role="presentation" ><a href="index.php">私信篮子</a></li>
       <li role="presentation"><a href="chat.php">聊天室</a></li>
       <li role="presentation"><a href="manage.php">私信管理</a></li>
       <li role="presentation" class="active"><a href="#">个人设置</a></li>
     </ul>
   </div>


    <?php
        /*教师身份*/
        if($_SESSION['userKind'] == 1) {
            require("common/tchForm.php");
        }  
        /*学生身份*/
        else {
        	require("common/stuForm.php");
        }
        include("common/footer.html");        //页脚区
    ?>
    
    <script src="bootstrap/js/jquery-1.11.3.js"></script>  <!-- 基于jQuery -->
    <script src="bootstrap/js/bootstrap.min.js"></script>  <!-- 调用bootstrap框架JS库 -->

     
 </body>
 </html>

 

