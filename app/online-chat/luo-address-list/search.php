<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :AdList  搜索页
    Update    : 
-->

<?php 
    require('func/protect_Session.php');   //访问保护
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdList  搜索页</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .person_list {
        margin-top: 20px;
    }
    .person_list th, td {
        width:100px;
        height: 25px;
    }
    .person_list tr.alt {
        background: #CAECEE;
    }
    </style>
</head>
<body>

    <?php  
        include("common/header.html");   //头部区
    ?>  

<div class="container">

    <ul class="nav nav-tabs" >
      <li role="presentation"><a href="index.php">首页</a></li>
      <li role="presentation"><a href="add.php">编辑</a></li>
      <li role="presentation" class="active"><a href="#">查询</a></li>
      <li role="presentation"><a href="quit.php">退出</a></li>
    </ul>

   <?php 
        include("common/content.html");  //搜索内容区
        if(isset($_SESSION['hasFind'])) {
            require('func/conn.php');        //连接数据库
            require("common/resultList.php");  //搜素结果
        }
        include("common/footer.html");   //页脚区
    ?>
    
</div>
</body>
</html>
