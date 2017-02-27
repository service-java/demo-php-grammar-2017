<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>index</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/carousel.css" rel="stylesheet">
  <link href="../css/nav.css" rel="stylesheet">
  <link href="../css/register.css" rel="stylesheet">
</head>
<body>

<!--导航条-->
<?php include("nav.php") ?>

<!--图片区-->
<div class = "nav-background-img"></div>

<div class="line container"><span>注册信息</span></div>

  <!--正文区-->
  <div class="container">
      <form class = "form-signin all-info info_all" action="register_to_sql.php" method="post">
          <ul class="login-info">
              <li><span class = 'glyphicon glyphicon-user text-icno'></span><input type="text" placeholder="请输入用户名" name = "username" class="text-info"></li>
              <li><span class = 'glyphicon glyphicon-lock text-icno'></span><input type="password" placeholder="请输入密码" name = "userpwd" class="text-info"></li>
              <li>
                  <dl class="info_item_btn">
                      <input type = "submit" value = "注册" class="btn btn-info" /> 
                      <input type = "reset" value = "重置"  class="btn btn-info"/> 
                  </dl>
          </ul>
   </form>
  </div>

  <!--页脚区-->
  <?php include("footer.php") ?>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/function.js"></script>
  <script src="../js/register.js"></script>
</body>
</html>