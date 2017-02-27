<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 登录校验
    Update    : 
-->

<?php 
//    session_start();      //开启session


    /* *****获取表单输入信息****** */
	$userId = $_REQUEST["userId"];
	$userPwd  = $_REQUEST["userPwd"];
	$userKind[0] = "0";                
             // 0表示学生，1表示教师
	@$userKind = $_REQUEST["isTch"];   
    //学生登录没选复选框，但请不要显示错误

    /* *****如果学号或密码为空**** */
    if(empty(trim($userId)) || empty(trim($userPwd))) {  
        echo "<script>";
        echo "alert('学号或密码不能为空！');";
        echo "window.history.back();";
        echo "</script>";
    }

    else {  
        require("conn.php");  //连接数据库
	alert("连接数据库成功！");
        if($userKind[0] === "1") {   
            /* *****查询teacher表的账号和对应密码**** */
            $sql="select tch_id,  tch_pwd  
                  from   teacher
                  where  tch_id = $userId ;";
            $_SESSION['userKind']   =  1;
        }   
        else {                       //查询student
        	$sql="select stu_id, stu_pwd
        	      from   student
        	      where  stu_id = $userId ;"; 
        	$_SESSION['userKind']   =  0;   //每次登录都更新下，并不是访问保护的标志
        }

        $res = mysql_query($sql);
        $row = mysql_fetch_array($res);

        /* *****查询结果为空行,即不存在该账号**** */
        if($row[0] == null)  {  
            echo "<script>";
            echo "alert('该用户未注册！');";
            echo "window.history.back();";
            echo "</script>";
        }
        /* *****账号存在但密码是错误的 ********* */
        else if($row[1] != $userPwd) {  
            echo "<script>";
            echo "alert('密码错误！');";
            echo "window.history.back();";
            echo "</script>";
        }
        else {    //校验成功，跳到首页
            $_SESSION[ 'userId' ]  = $row[0];  //访问保护的标志
            $_SESSION[ 'userPwd' ] = $row[1];
    
            /*教师身份，系统自动删除该人10天以前未被收藏且已读的信息*/
            if($_SESSION['userKind'] == 1) {
                $sql = "delete from stuMessage
                        where toTch = ".$_SESSION['userId']."
                        and timestampdiff(hour, time, CURRENT_TIMESTAMP) > 10*24
                        and isCollected = 0
                        and isRead = 1;";

            }
            /*学生身份*/
            else  {
                $sql = "delete from tchMessage
                        where toStu = ".$_SESSION['userId']."
                        and timestampdiff(hour, time, CURRENT_TIMESTAMP) > 10*24
                        and isCollected = 0
                        and isRead = 1;";
            }
            mysql_query($sql);

            unset($_SESSION['captcha']);   //在注册页成功登录的话，即使销毁captcha

            /* *****通过校验跳转到首页 **** */
            echo("<script>window.location='../index.php';</script>"); 
        }
    }

 ?>
