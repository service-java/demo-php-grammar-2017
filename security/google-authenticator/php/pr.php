<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>index</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/carousel.css" rel="stylesheet">
    <link href="../css/nav.css" rel="stylesheet">
    <link href="../css/register.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <!--导航条开始-->
  <?php include("nav.php") ?>
  <!--导航条结束-->

  <!--图片区开始-->
  <div class = "nav-background-img"></div>
  <!--图片区结束-->

  <div class="line container"><span>二维码信息</span></div>

	 <!--正文区开始-->
	 <div class="container">
        <ul class="login-info">
            <?php
              session_start();
              //获取id值
              $name = $_SESSION['name'];
              //连接数据库
              include("conn.php");
              //执行查询sql语句
              $sql = "SELECT pwd,secret FROM user WHERE name = '$name'";
              $res = mysqli_query($conn,$sql);
              $rows = mysqli_fetch_array($res,MYSQLI_ASSOC);

              $secret = $rows['secret'];

              require_once '../GoogleAuthenticator/PHPGangsta/GoogleAuthenticator.php';
              $ga = new PHPGangsta_GoogleAuthenticator();
              $qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);

              echo "<p><span class = 'glyphicon glyphicon-user'></span>用户名: $name </p>";
              echo "<img src = '$qrCodeUrl'>";
              echo "<p>请下载Authenticator扫描</p>";
              @mysqli_close();
            ?>
            <li>
              <dl class="info_item_btn">
                    <input type = "button" value = "确定"  class="btn btn-info"/>
              </dl>
        </ul>
   </div>
	 <!--正文区结束-->

	 <!--页脚区开始-->
	 <?php include("footer.php") ?>
	 <!--页脚区结束-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/function.js"></script>
    <script src="../js/register.js"></script>
  </body>
</html>