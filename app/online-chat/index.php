<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 首页(私信篮子页) 
    Update    : 
-->


<?php 
    require("func/protect_session.php");  //访问保护，注意session已开启
    unset($_SESSION['hasOtherChat']);     //必须先删除另一种聊天入口变量
 ?>

 <!DOCTYPE html>
 <html lang="zh-CN">
 <head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"> <!--  为了响应式布局 -->
     <title>Qmen'  首页</title>
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
       <li role="presentation" class="active"><a href="#">私信篮子</a></li>
       <li role="presentation"><a href="chat.php">聊天室</a></li>
       <li role="presentation"><a href="manage.php">私信管理</a></li>
       <li role="presentation"><a href="myself.php">个人设置</a></li>
     </ul>
   </div>



    <?php  
        require("common/receiveList.php");    //私信篮子区



    ?>
    


<!--     <div class="container">
       <nav>
         <ul class="pagination">
           <li>
             <a href="#" aria-label="Previous">
               <span aria-hidden="true">&laquo;</span>
             </a>
           </li>
           <li><a href="#">1</a></li>
           <li><a href="#">2</a></li>
           <li><a href="#">3</a></li>
           <li><a href="#">4</a></li>
           <li><a href="#">5</a></li>
           <li>
             <a href="#" aria-label="Next">
               <span aria-hidden="true">&raquo;</span>
             </a>
           </li>
         </ul>
       </nav>  
    </div> -->


    <?php  
        include("common/footer.html");        //页脚区
    ?>
    
    <script src="bootstrap/js/jquery-1.11.3.js"></script>  <!-- 基于jQuery -->
    <script src="bootstrap/js/bootstrap.min.js"></script>  <!-- 调用bootstrap框架JS库 -->

     
 </body>
 </html>