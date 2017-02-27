<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen'  管理私信和删除 
    Update    : 
-->

<?php 
    session_start();  //开启session
    echo header("Content-Type:text/html;charset=utf-8");   //保证中文输出

    /* *****获取消息编号数组和操作按钮类型***** */
    if(@$_REQUEST['choice']) {
        @$choice = $_REQUEST['choice'];
        $submitType = $_REQUEST['submitType'];
        for($i = 0; $i < count($choice); $i++) {
            $choice[$i] = (int)$choice[$i];  
        }                //字符型转化成整数
        
        
        require("conn.php"); //连接数据库


        /*教师身份*/
        if($_SESSION['userKind'] == 1) {

            /* *****教师身份实现批量收藏***** */
            if($submitType == "collect") {
                for($i = 0; $i < count($choice); $i++) {
                    $sql = "update stuMessage
                            set    isCollected = 1 
                            where  message_no = $choice[$i] ;";
                    mysql_query($sql);
                }
            }
            /* *****教师身份实现批量删除***** */
            else if($submitType == "delete") {
                for($i = 0; $i < count($choice); $i++) {
                    $sql = "update stuMessage
                            set    isDelete = 1
                            where  message_no = $choice[$i] 
                                   and isCollected = 0;";
                    mysql_query($sql);
                }

            }
        }

        /*学生身份*/
        else if($_SESSION['userKind'] == 0) {
            if($submitType == "collect") {
                for($i = 0; $i < count($choice); $i++) {
                    $sql = "update tchMessage
                            set    isCollected = 1
                            where  message_no = $choice[$i] ;";
                    mysql_query($sql);
                }
            }
            else if($submitType == "delete") {
                for($i = 0; $i < count($choice); $i++) {
                    $sql = "update tchMessage
                            set    isDelete = 1
                            where  message_no = $choice[$i] 
                               and isCollected = 0;";
                    mysql_query($sql);
                }
            }
        }

        if($submitType == "collect") {
            echo "<script>";
            echo "alert('收藏成功！');";
            echo "window.history.back();";
            echo "</script>";
        }
        else if($submitType == "delete") {
            echo "<script>";
            echo "alert('删除成功！');";
            echo "window.history.back();";
            echo "</script>";
        }
    }

    else {
        echo "<script>";
        echo "alert('未选择任何消息！');";
        echo "window.history.back();";
        echo "</script>"; 
    }
    

  

 ?>


