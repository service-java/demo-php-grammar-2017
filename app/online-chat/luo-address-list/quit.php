<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :AdList 退出页 
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
    <title>AdList 退出页</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php  
    include("common/header.html");  //包括头部区
?>  

<div class="container">

    <ul class="nav nav-tabs" >
      <li role="presentation"><a href="index.php">首页</a></li>
      <li role="presentation"><a href="add.php">编辑</a></li>
      <li role="presentation"><a href="search.php">查询</a></li>
      <li role="presentation" class="active"><a href="#">退出</a></li>
    </ul>

    <?php
        
        //输出文件MIME格式
        header ( "content-type:application/vnd.ms-excel" );
        //指定输出文件名
        header ( "content-disposition:attachment;filename=export.xls" );


        include("func/conn.php");
        $sql = "select real_Name, mobile, address, enter_Year
                from student 
                order by enter_year desc";
        $rs=mysql_query($sql);

        //输出表格头
        print("<table border='1'>");
          print("<caption>数据库里的校友人员列表</caption>");
          print("<tr>");
          print("<th>姓名</th>");
          print("<th>手机</th>");
          print("<th>住址</th>");
          print("<th>入学年份</th>");
          print("</tr>");

          // 循环输出记录行
        while($row=mysql_fetch_array($rs)){
          print("<tr>");
              print("<td><a href='#'>".$row["real_Name"]."</a></td>");
              print("<td><a href='#'>".$row["mobile"]."</a></td>");
              print("<td><a href='#'>".$row["address"]."</a></td>");
              print("<td><a href='#'>".$row["enter_Year"]."</a></td>");
              print("</tr>");

        }
        print("</table>");

        // 销毁and关闭连接 
        unset($row);
        unset($rs);
        

        echo("<script>window.location='login.php';</script>");
        session_destroy();  //销毁会话
     ?>

</div>
  
</body>
</html>
