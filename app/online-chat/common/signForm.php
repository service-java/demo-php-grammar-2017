<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 注册表格区 
    Update    : 
-->

<?php 
    session_start();  //开启session，要放在开头
 ?>
<div class="container">
    <!-- 注册表单 -->
    <div class="row">
      <form class="form-horizontal col-md-5" 
            action = "func/check_sign.php"
            method="post" 
            enctype="multipart/form-data">
        <div class="form-group">
          <label for="stu_id" class="col-sm-2 control-label">学号</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="stu_id" name="stu_id" placeholder="必填  10位有效学号">
          </div>
        </div>
        <div class="form-group">
          <label for="stu_name" class="col-sm-2 control-label">姓名</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="stu_name" name="stu_name" placeholder="必填">
          </div>
        </div>
        <div class="form-group">
          <label for="stu_pwd" class="col-sm-2 control-label">密码</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="stu_pwd" name="stu_pwd" placeholder="必填 密码位数不小于6">
          </div>
        </div>
        <div class="form-group">
          <label for="class_id" class="col-sm-2 control-label">班级号</label>
          <div class="col-sm-10">
            <select class="form-control" id="class_id" name="class_id">
              <?php 
                require("func/conn.php");
                $sql = "select class_id, class_name from class;";
                $res = mysql_query($sql);
                while($row = mysql_fetch_array($res)) {
                  echo "<option value='".$row['class_id']."'>".$row['class_name']."</option>";
                } 
               ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="captcha" class="col-sm-2 control-label">验证码</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="captcha" name="captcha" placeholder="请填入右侧验证码">
          </div>
          <?php   
              //产生随机验证码，$_SESSION['captcha']临时记录
              $captcha1 = mt_rand(1,9);
              $captcha2 = mt_rand(1,9);
              $captcha3 = mt_rand(1,9);
              $captcha4 = mt_rand(1,9);
              $_SESSION['captcha'] = "$captcha1"."$captcha2"."$captcha3"."$captcha4";
    
              echo "<a href='sign.php'>
                    <img src='images/captcha/".$captcha1.".png' alt='captcha' height='34px'></a>";
              echo "<a href='sign.php'>
                    <img src='images/captcha/".$captcha2.".png' alt='captcha' height='34px'></a>";
              echo "<a href='sign.php'>
                    <img src='images/captcha/".$captcha3.".png' alt='captcha' height='34px'></a>";
              echo "<a href='sign.php'>
                    <img src='images/captcha/".$captcha4.".png' alt='captcha' height='34px'></a>";
           ?>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" value="sign">注册</button>
            <button type="reset" class="btn btn-default" value="reset">重置</button>
          </div>
        </div>
      </form>

      <div class="col-md-offset-1 col-md-2"> <!-- 缩略图1 -->
        <div class="thumbnail">
          <img src="images/img_sleep.jpg" alt="sleep">
          <div class="caption">
            <h3><mark>Qmen_Lab</mark></h3>
            <p>欢迎上我们的贼船，这样贼船就更大了！</p>
            <p><a href="https://www.baidu.com/" 
                  class="btn btn-primary" role="button">去围观</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-2"> <!-- 缩略图2 -->
        <div class="thumbnail">
          <img src="images/img_hi.jpg" alt="hi">
          <div class="caption">
            <h3><mark>王五</mark></h3>
            <p>著名讲师，<br>风趣幽默作业少。</p>
            <p><a href="http://hznu.fanya.chaoxing.com/" 
                  class="btn btn-default" role="button">去蹭课</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-2"> <!-- 缩略图3 -->
        <div class="thumbnail">
          <img src="images/img_umbrella.jpg" alt="umbrella">
          <div class="caption">
            <h3><mark>张三</mark></h3>
            <p>你可能不认识他,<br>但他的记录里有你。</p>
            <p><a href="https://www.baidu.com/" 
                  class="btn btn-default" role="button">去认领</a></p>
          </div>
        </div>
      </div>
    </div>
</div>
  
