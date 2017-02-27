<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :AdList  新增页
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
    <META  NAME="save"   CONTENT="history">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdList  新增页</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php  
    include "common/header.html";   //头部区

?>  

<div class="container">

    <ul class="nav nav-tabs" >
      <li role="presentation"><a href="index.php">首页</a></li>
      <li role="presentation"  class="active"><a href="#">编辑</a></li>
      <li role="presentation"><a href="search.php">查询</a></li>
      <li role="presentation"><a href="quit.php">退出</a></li>
    </ul>

   <?php 
        if($_SESSION['userkind'] == '1') {
            include("common/member.php");    //添加校友区
        }
        else {
            include("common/myself.php");    //添加校友区
        }
        include("common/image_Upload.php");  //图片上传区
        include("common/footer.html");  //图片上传区
    ?>
</div>

</body>
</html>
