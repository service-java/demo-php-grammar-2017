<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :AdList  管理员新增校友页
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
        include("common/other.php");    //校友信息修改区        
    ?>


    <form class="form-horizontal col-md-5 col-md-offset-1" 
          action="func/upload_File.php"
          method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pic4">预览图片</label> <br>
            <img id="pic4" src="" alt="图片在此显示" height="291px"/>
        </div>
        <div class="form-group">
            <label for="file4">上传图片(请先填个人信息)</label>  
            <input class="btn btn-default" type="file" id="file4"  name="file">
            <input class="btn btn-default" type="submit" name="submit" value="上传">
        </div>

        <?php 
          $id = $_REQUEST['id'];
          $_SESSION['hasEdit'] = 'yes'; 
          $_SESSION['temp'] = $id;
          require("func/conn.php");
          $sql ="select image
                 from student
                 where student_Id = $id;";
          $res = mysql_query($sql);
          $row = mysql_fetch_array($res);
          echo "<script>";    
          echo "document.getElementById('pic4').src='".$row['image']."';";
          echo "</script>";
          unset($_SESSION['userimage']);  //别忘了扫尾
         ?>
    </form> 

    <?php        
         include("common/footer.html");  //页脚区
     ?>



    
</div>

</body>
</html>
