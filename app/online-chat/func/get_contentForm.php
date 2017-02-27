<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 获取修改信息
    Update    : 
-->

<?php 
   echo header("Content-Type:text/html;charset=utf-8");   //保证中文输出
   session_start();
   
   /* *****获取输入的个人信息***** */
   $tempUserId = (int)$_SESSION['userId'];
   $name = $_REQUEST['name'];
   $business = $_REQUEST['business'];
   $pwd  = $_REQUEST['pwd'];
   $mobile   = $_REQUEST['mobile'];
   $address  = $_REQUEST['address'];
   
   /* *****校验输入的姓名长度***** */
   if(!(strlen($name) <= 10 && strlen($name) > 0)) {
   		echo "<script>";
   		echo "alert('注意姓名！');";
   		echo "window.history.back();";
   		echo "</script>";
   }
   else if(!(strlen($business) <= 20 || strlen($business) == 0)){
   		echo "<script>";
   		echo "alert('研究方向字数太长！');";
   		echo "window.history.back();";
   		echo "</script>";
   }
   /* *****校验输入的密码长度***** */
   else if(!(strlen($pwd) >=6 && strlen($pwd) <= 10)) {
   		echo "<script>";
   		echo "alert('注意密码位数！');";
   		echo "window.history.back();";
   		echo "</script>";
   }
   /* *****校验输入的手机号长度,考虑到可以为空***** */
   else if(!(strlen($mobile) == 11 || strlen($mobile) == 0)) {
   		echo "<script>";
   		echo "alert('注意手机位数！');";
   		echo "window.history.back();";
   		echo "</script>";
   }
   else if(!(strlen($address) <= 30 || strlen($address) == 0)) {
   		echo "<script>";
   		echo "alert('地址字数太长！');";
   		echo "window.history.back();";
   		echo "</script>";
   }
   else {
       /* *****教师身份 个人信息更新*/
       require("conn.php");  //连接数据库
   	   if($_SESSION['userKind'] == 1) {
           $sql = "update teacher 
                   set    tch_name = '".$name."',
                          business = '".$business."',
                          tch_pwd  = '".$pwd."',
                          mobile   = '".$mobile."',
                          address  = '".$address."'
                   where  tch_id = $tempUserId;";
       }
       /*学生身份*/
       else {
          $sql = "update student 
                  set    stu_name = '".$name."',
                         business = '".$business."',
                         stu_pwd  = '".$pwd."',
                         mobile   = '".$mobile."',
                         address  = '".$address."'
                  where  stu_id = ".$tempUserId." ;";
       }
       mysql_query($sql);
       echo "<script>";
       echo "alert('修改成功！');";
       echo "window.history.back();";
       echo "</script>";

   }



 ?>