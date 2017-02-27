<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 退出系统 
    Update    : 
-->


<?php 
    require("protect_session.php");  //访问保护，注意session已开启
    session_destroy();  //销毁会话
    echo("<script>window.location.href='../login.php';</script>");

 ?>