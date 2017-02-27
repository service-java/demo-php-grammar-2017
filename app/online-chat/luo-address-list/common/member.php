<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :新增校友区 
    Update    : 
-->


<style>
    .form-horizontal {
        margin-top: 15px;
    }
</style>

  
<form class="form-horizontal col-md-6" 
      action = "func/getForm_Admin.php"
      method="post" 
      enctype="multipart/form-data">
  <div class="form-group">
    <label for="student_Name" class="col-sm-2 control-label">校友账号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="student_Name" name="student_Name" placeholder="必填  例 Luo_0412">
    </div>
  </div>
  <div class="form-group">
    <label for="real_Name" class="col-sm-2 control-label">真实姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="real_Name" name="real_Name" placeholder="必填">
    </div>
  </div>
  <div class="form-group">
    <label for="mobile" class="col-sm-2 control-label">手机号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="请输入  11位有效手机号码">
    </div>
  </div>
  <div class="form-group">
    <label for="card_No" class="col-sm-2 control-label">身份证号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="card_No" name="card_No" placeholder="必填">
    </div>
  </div>
  <div class="form-group">
    <label for="business" class="col-sm-2 control-label">职业</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="business" name="business" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="address" class="col-sm-2 control-label">通讯地址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="address" name="address" placeholder="请输入  通讯地址">
    </div>
  </div>
  <div class="form-group">
    <label for="enter_Year" class="col-sm-2 control-label">入学年份</label>
    <div class="col-sm-10">
      <!-- <input type="text" class="form-control" id="enter_Year" name="enter_Year"> -->
      <select class="form-control" id="enter_Year" name="enter_Year">
        <option value = '2014'>2014</option>
        <option value = '2015' selected="selected">2015</option>
        <option value = '2016'>2016</option>
        <option value = '2017'>2017</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="class_Id" class="col-sm-2 control-label">班级号</label>
    <div class="col-sm-10">
      <select class="form-control" id="class_Id" name="class_Id">
        <?php 
          include("func/conn.php");
          $sql = "select class_Id, class_Name from class;";
          $res = mysql_query($sql);
          while($row = mysql_fetch_array($res)) {
            echo "<option value='".$row['class_Id']."'>".$row['class_Name']."</option>";
          } 
         ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" value="add">新增校友</button>
      <button type="reset" class="btn btn-default">重置信息</button>
    </div>
  </div>
</form>





