<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-11
    Version   :1.0
    Function  :AdList  登录页 
    Update    : 
-->

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdList  登录页</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <?php  
        include("common/header_Login.html");   //头部区   
    ?>    

<div class="container">
    
    <?php 
        include("common/introduction.html");  //介绍区
        include("common/footer.html");        //页脚区
    ?>

</div>

    <script src="bootstrap/js/jquery-1.11.3.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
        $('.carousel').carousel({
          interval: 2000   //切换图片的时间间隔
        })
    </script>
</body>
</html>
