<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 注册校验
    Update    : 
-->

<?php 
    echo header("Content-Type:text/html;charset=utf-8");   //保证中文输出
    session_start();      //开启session
    
    /* *****获取用户的注册信息 **** */
    $isSigned = 0;  //0表示未注册, 1反之 
    $stu_id   = $_REQUEST["stu_id"];
    $stu_name = $_REQUEST["stu_name"];
    $stu_pwd  = $_REQUEST["stu_pwd"];
    $class_id = $_REQUEST["class_id"];
    $captcha  = $_REQUEST["captcha"];


    /* *****注册表单填写不全 **** */
    if (   empty(trim($stu_id)) 
       || empty(trim($stu_name))
       || empty(trim($stu_pwd))
       || empty(trim($captcha))   ) {  
        echo "<script>";
        echo "alert('表单未填写完整！');";
        echo "window.history.back();";
        echo "</script>";
    }
    /* *****校验学号位数 ******** */
    else if(strlen($stu_id) != 10) {   
        echo "<script>";
        echo "alert('注意学号位数！');";
        echo "window.history.back();";
        echo "</script>"; 
    }   //分支语句之间尽量不要插入别的语句
    else if(strlen($stu_pwd) < 6|| strlen($stu_pwd) >10 ) {  //校验密码位数
        echo "<script>";
        echo "alert('注意密码位数！');";
        echo "window.history.back();";
        echo "</script>"; 
    }   //分支语句之间尽量不要插入别的语句
    /* *****校验验证码 ********** */
    else if( $captcha != $_SESSION['captcha']) {  
    	echo "<script>";
    	echo "alert('验证码输入错误！');";
    	echo "window.history.back();";
    	echo "</script>";
    }
    else {
    	require("conn.php"); 
        /* *****查询账号是否已注册**** */ 
    	$sql = "select stu_id
    	        from student;";
    	$res = mysql_query($sql);

        /* *****查询账号是否已注册**** */ 
    	while($row = mysql_fetch_array($res)) {  
    		if($stu_id == $row[0]) {
    			echo "<script>";
    			echo "alert('此学号已注册！');";
    			echo "window.history.back();";
    			echo "</script>";
    			$isSigned = 1;
    		}
    	}

        /* *****没有注册过，执行注册语句**** */
        if($isSigned == 0) {  
        	$sql = "insert into student values (
        	         $stu_id, 
        	         '".$stu_name."', 
        	         '".$stu_pwd."', 
        	         $class_id,
                     null,
                     null,
                     null,
                     null);";
        	mysql_query($sql);
        	$_SESSION['userId']  = $stu_id;
        	$_SESSION['userPwd'] = $stu_pwd;
        	$_SESSION['userKind'] = 0;     //类似于成功登陆
        	unset($_SESSION['captcha']);   //销毁存储验证码的临时session


            /*自动发送给新注册学生的欢迎语*/
            $sql = "select teacher.tch_id,teacher.tch_name
                    from   teacher,teach
                    where  teach.class_id = $class_id
                       and teacher.tch_id = teach.tch_id;";
            $res = mysql_query($sql);
            
            while($row = mysql_fetch_array($res)) {
                $sql2 = "insert into tchMessage values (
                        null,
                        CURRENT_TIMESTAMP,
                        '".$stu_name."同学好，我是".$row[1]."老师，欢迎来到我的课堂。',
                        $row[0],
                         $stu_id,
                         0,
                         0,
                         0);";
                mysql_query($sql2);
            }




        	echo "<script>";
        	echo "alert('注册成功,即将跳转首页！');";
        	echo "window.location='../index.php';";
        	echo "</script>";
        }
    }
    


 ?>