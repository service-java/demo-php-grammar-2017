<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :登录检验
-->

<?php
    
    echo header("Content-Type:text/html;charset=utf-8");  //保证中文输出
    session_start();      //开启session
    

    /*获取表单元素*/
    $username = $_REQUEST["userName"];
    $userpwd  = $_REQUEST["userPwd"];
    $userkind[0] = 0;   
    @$userkind = $_REQUEST["hello"];  //如果不选的话就不存在的bug不要显示
    // @print_r($userkind[0]);        //checkbox传过来的$userkind是字符串
    

    /*判断用户名与密码是否为空*/
    if(empty(trim($username)) || empty(trim($userpwd))) {
        echo "<script>";
        echo "alert('用户名或者密码不能为空！');";
        echo "window.history.back();";
        echo "</script>";
    }
    else {  //不为空时
        require("conn.php");
        if($userkind[0] === "1") {
            $sql="SELECT admin_Name, admin_Pwd
                  FROM  admin
                  WHERE admin_Name = '".$username."'"; 
            $_SESSION['userkind']   =  1;
        }
        else {
            $sql="SELECT student_Name,  student_Pwd  
                  FROM   student
                  WHERE  student_Name = '".$username."'";
            $_SESSION['userkind']   =  0;
        }

        $res = mysql_query($sql);
        $row = mysql_fetch_array($res);
        if($row[0] == null)  {
            echo "<script>";
            echo "alert('该用户名未注册！');";
            echo "window.history.back();";
            echo "</script>";
        }
        else if($row[1] != $userpwd) {
            echo "<script>";
            echo "alert('密码错误！');";
            echo "window.history.back();";
            echo "</script>";
        }
        else {
            $_SESSION[ 'username' ] = $row[0];
            $_SESSION[ 'password' ] = $row[1];

            // var_dump($_SESSION);
            // session_destroy();
            echo("<script>window.location='../index.php';</script>");
        }
        
    }


?>