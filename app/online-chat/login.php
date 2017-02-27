<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 登录页 
    Update    : 
-->


<!DOCTYPE html>
<html lang="zh-CN">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--  为了响应式布局 -->
    <title>Qmen'  登录页</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">  <!-- 调用bootstrap框架CSS -->
    
</head>
<body>

    <?php  
        include("common/loginHeader.html");   //登录注册区   
        include("common/introduction.html");  //介绍区
        include("common/footer.html");        //页脚区
    ?>


    <script src="bootstrap/js/jquery-1.11.3.js"></script>  <!-- 基于jQuery -->
    <script src="bootstrap/js/bootstrap.min.js"></script>  <!-- 调用bootstrap框架JS库 -->
    <script>
        $('.carousel').carousel({
          interval: 2500  //设置图片切换的时间间隔
        })
    </script>
</body>
</html>
