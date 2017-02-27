<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :函数库 
    Update    : 
-->


<?php 
	function page_redirect($back,$path,$info){ 
	    echo "<script>"; 
	    //输出提示信息，为空不输出 
	    if(!empty($info)) echo "alert($info);"; 
	    //根据页面重定向类型，执行不同跳转 
	    if($back) //回退 
	    	echo "window.history.back();";
		else { 
			//重定向到指定页面 
			if(!empty($path)) 
				echo "window.location='".$path."';"; 
	    } 
	    echo "</script>"; 
	} 
?>