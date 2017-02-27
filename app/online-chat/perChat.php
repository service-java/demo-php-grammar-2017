<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 聊天室区 
    Update    : 
-->

<?php 
    require("func/protect_session.php");  //访问保护，注意session已开启
    $tempUserId = (int)$_SESSION['userId'];
    // var_dump($_SESSION);

    if(!isset($_SESSION['hasOtherChat'])) {
        $_SESSION['chatId'] = (int)$_REQUEST['id'];  //获取聊天对象的id号
    }
    
    
 ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>

 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1"> <!--  为了响应式布局 -->
 <title>Qmen'  聊天室</title>
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">  <!-- 调用bootstrap框架CSS -->
 <style>
     .panel {
        margin-top: 10px;
        margin-bottom: 2px; 
     }
     .panel-body span.alt {
        background: #CAECEE;
        padding:2px;
     }
     .form-inline textarea {
        height: 35px;
        margin: -15px 0px 2px 4px;
     }
     .form-inline button {
        margin-top: -17px;
     }
     .nav-tabs {
        margin-top: 120px;
     }
 </style>
</head>
<body>

 <?php  
     include("common/header.html");   //头部区   
 ?>

<!-- 标签页导航 -->
<div class="container">
  <ul class="nav nav-tabs">
    <li role="presentation" ><a href="index.php">私信篮子</a></li>
    <li role="presentation" class="active"><a href="#">聊天室</a></li>
    <li role="presentation"><a href="manage.php">私信管理</a></li>
    <li role="presentation"><a href="myself.php">个人设置</a></li>
  </ul>
  <div class="col-md-5">
    <!-- 最新消息显示列表 -->
    <div class="panel panel-info">
      <div class="panel-heading" style="background:#CAECEE">
        <?php  
            require("func/conn.php");  //连接数据库
            if($_SESSION['userKind'] == '1') {  //教师身份
                $sql = "select stu_name from student where stu_id = ".$_SESSION['chatId']." ;";
                $res = mysql_query($sql);
                $row = mysql_fetch_array($res);
                echo $row[0]."  同学(最新消息)";
            }
            else {                              //学生身份
                $sql = "select tch_name from teacher where tch_id = ".$_SESSION['chatId']." ;";
                $res = mysql_query($sql);
                $row = mysql_fetch_array($res);
                echo $row[0]."  老师(最新消息)";
            }
        ?>  
      </div>
      <div class="panel-body">
        <?php 
            if($_SESSION['userKind'] == '1') {  //教师身份
                $sql = "select time,content
                        from   stuMessage 
                        where  fromStu = ".$_SESSION['chatId']."
                               and toTch = $tempUserId 
                               and isRead = 0
                               and isDelete = 0 ;";
                $res = mysql_query($sql);

                if(mysql_affected_rows() <= 0) {
                    $sql = "select time,content
                            from   stuMessage 
                            where  fromStu = ".$_SESSION['chatId']."
                                   and toTch = $tempUserId
                                   and isDelete = 0
                            order by time desc
                            limit 3;";
                    $res = mysql_query($sql);
                    $i = 0;
                    while($row = mysql_fetch_array($res)) {
                        if($i == 0)
                        echo "<p>".$row[0]."<br><span class='alt' >".$row[1]."</span></p>";
                        else 
                          echo "<p>".$row[0]."<br><span>".$row[1]."</span></p>";
                        $i ++;
                    }
                    $sql = "select time,content
                            from   tchMessage 
                            where  fromTch = $tempUserId
                                   and toStu = ".$_SESSION['chatId']." 
                            order by time desc
                            limit 2;";
                    $res = mysql_query($sql);
                    $i = 0;
                    while($row = mysql_fetch_array($res)) {
                        if($i == 0)
                        echo "<p class='text-right'>".$row[0]."<br><span class='alt' >".$row[1]."</span></p>";
                        else 
                          echo "<p class='text-right'>".$row[0]."<br><span>".$row[1]."</span></p>";
                        $i ++;
                    }

                }
                else {
                    while($row = mysql_fetch_array($res)) {
                        echo "<p>".$row[0]."<br><span class='alt'>".$row[1]."</span></p>";
                    }
                    $sql = "update stuMessage 
                            set    isRead = 1
                            where  fromStu = ".$_SESSION['chatId']."
                                   and toTch = $tempUserId;";
                    mysql_query($sql);
                }

            }


            else {                              //学生身份
                $sql = "select time,content
                        from   tchMessage 
                        where  fromTch = ".$_SESSION['chatId']."
                               and toStu = $tempUserId 
                               and isRead = 0
                               and isDelete = 0 ;";
                $res = mysql_query($sql);
                if(mysql_affected_rows() <= 0) {
                    $sql = "select time,content
                            from   tchMessage 
                            where  fromTch = ".$_SESSION['chatId']."
                                   and toStu = $tempUserId
                                   and isDelete = 0 
                            order by time desc
                            limit 3;";
                    $res = mysql_query($sql);
                    $i = 0;
                    while($row = mysql_fetch_array($res)) {
                        if($i == 0)
                        echo "<p>".$row[0]."<br><span class='alt' >".$row[1]."</span></p>";
                        else 
                          echo "<p>".$row[0]."<br><span>".$row[1]."</span></p>";
                        $i ++;
                    }
                    $sql = "select time,content
                            from   stuMessage 
                            where  fromstu = $tempUserId
                                   and toTch = ".$_SESSION['chatId']." 
                            order by time desc
                            limit 2;";
                    $res = mysql_query($sql);
                    $i = 0;
                    while($row = mysql_fetch_array($res)) {
                        if($i == 0)
                        echo "<p class='text-right'>".$row[0]."<br><span class='alt' >".$row[1]."</span></p>";
                        else 
                          echo "<p class='text-right'>".$row[0]."<br><span>".$row[1]."</span></p>";
                        $i ++;
                    }

                }
                else {
                    while($row = mysql_fetch_array($res)) {
                        echo "<p>".$row[0]."<br><span class='alt'>".$row[1]."</span></p>";
                    }
                    $sql = "update tchMessage 
                            set    isRead = 1
                            where  fromTch = ".$_SESSION['chatId']."
                                   and toStu = $tempUserId;";
                    mysql_query($sql);
                }

            }
         ?>
      </div>
      <hr>
      <!-- 私发表格 -->
      <form class="form-inline"
            action="func/get_perChat.php"
            method="post">
        <div class="form-group">
          <textarea class='form-control' rows='2' cols='48'  
                  id='content' name='content'></textarea>
                            
          <button type="submit" class="btn btn-info">发送</button>
        </div>

      </form>
    </div>


  </div>


</div>

    <script src="bootstrap/js/jquery-1.11.3.js"></script>  <!-- 基于jQuery -->
    <script src="bootstrap/js/bootstrap.min.js"></script>  <!-- 调用bootstrap框架JS库 -->
    
</body>
</html>