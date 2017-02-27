<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 私信篮子区 
    Update    : 
-->

<style>
	.receiveList td {
		padding:4px 8px 4px 8px;
	}
	.receiveList th {
		padding:4px 8px 4px 8px;
		border-bottom: 1px dotted;
	}
	.receiveList th.alt {
		width: 250px;
	}
	.receiveList td.alt {
		width: 250px;
	}
	.receiveList tr.alt {
    	background: #CAECEE;
	}
</style>

<div class="container">
	<table class="receiveList">
	    <thead>
	        <tr>
	        <?php 
	        	if($_SESSION['userKind'] == '1') {  //教师身份
	        		echo "<th>状态</th>
	          	          <th class='alt'>私信内容</th>
	          	          <th>时间</th>
	          	          <th>班级</th>
	          	          <th>学生</th>
                          <th>与TA聊天</th>";
	        	}
	        	else {                              //学生身份
	        		echo "<th>状态</th>
          	              <th>私信内容</th>
          	              <th>时间</th>
          	              <th>老师</th>
          	              <th>与TA聊天</th>";
	        	}
	         ?>
	      	</tr>
	  	</thead>
	    <tbody>

	    <?php
	    	require("func/conn.php");           //连接数据库

	    	// 每页数量
	    	$page_size = 10; 

	    	if(isset($_GET['page']) ){
	    	  $page = intval( $_GET['page'] );
	    	}
	    	else{
	    	  $page = 1;
	    	} 

	    	// 获取总数据量
	    	
	    	$tempUserId = (int)$_SESSION['userId'];  //字符串用户账号转化成整数

	    	/* *****教师身份，查询消息条数***** */
	    	if($_SESSION['userKind'] == 1) {
	    		$sql = "select count(content) as amount
	    		        from   stuMessage,student,class
	    		        where  stuMessage.fromStu = student.stu_id
	    		               and student.class_id = class.class_id
	    		               and toTch = $tempUserId
	    		               and isDelete = 0";
	    	}
	    	else {
	    		$sql = "select count(content) as amount
                        from   tchMessage,teacher
                        where  tchMessage.fromTch = teacher.tch_id
                               and toStu = $tempUserId
                               and isDelete = 0";
	    	}
	    	
	    	$res=mysql_query($sql);
	    	$row=mysql_fetch_array($res);
	    	$amount =$row['amount'];

	    	//记算总共有多少页
	    	if($amount){
	    	      //如果总数据量小于$PageSize，那么只有一页
	    	      if($amount < $page_size ){ $page_count = 1; } 
	    	      //取总数据量除以每页数的余数
	    	      if( $amount % $page_size ){
	    	    //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
	    	        $page_count = (int)($amount / $page_size) + 1;          
	    	      }else{
	    	    //如果没有余数，则页数等于总数据量除以每页数的结果
	    	        $page_count = $amount / $page_size;                     
	    	    }
	    	}
	    	else{
	    	    $page_count = 0;
	    	}

	    	// 分页链接
	    	$page_string = '';
	    	if( $page == 1 ){
	    	    $page_string .= '第一页|上一页|';
	    	}
	    	else{
	    	    $page_string .= '<a href=?page=1>第一页</a>|<a href=?page='.($page-1).'>上一页</a>|';
	    	} 
	    	if( ($page == $page_count) || ($page_count == 0) ){
	    	    $page_string .= '下一页|尾页';
	    	}
	    	else{
	    	    $page_string .= '<a href=?page='.($page+1).'>下一页</a>|<a href=?page='.$page_count.'>尾页</a>';
	    	} 
	    	
	    	
	    	if($_SESSION['userKind'] == '1') {  
	    		/* *****教师身份 查询所在分页的私信**** */
	    		$sql = "select isRead,content,time,class_name,stu_name,stu_id
	    		        from   stuMessage,student,class
	    		        where  stuMessage.fromStu = student.stu_id
	    		               and student.class_id = class.class_id
	    		               and toTch = $tempUserId
	    		               and isDelete = 0
	    		        order by time desc
	    		        limit ". ($page-1)*$page_size .", $page_size";
	    		$res = mysql_query($sql);
	    		$j = 1;
				/* *****循环遍历查询结果***** */
	    		while($row = mysql_fetch_array($res)) {
	    		    if($j % 2 == 1) {   //隔行样式
	    		    	echo "<tr class='alt'>";
	    		    }
	    		    else {
	    		    	echo "<tr>";
	    		    }

	    		    if($row[0] == 0) {  //私信状态：未读
	    		    	echo "<td>未读 <span class='glyphicon glyphicon-ok-circle' 
	    		    	                aria-hidden='true'></span></td>";
	    		    }
	    		    else {
	    		    	echo "<td>已读 <span class='glyphicon glyphicon-ok-sign' 
	    		    	                aria-hidden='true'></span></td>";
	    		    }
	    		    
	    		    echo "<td class='alt'>$row[1]</td>";  //内容区设置固定宽度，防跳动感

	    			for($i = 2; $i < 5; $i++) { 
	    				echo "<td>$row[$i]</td>"; 
	    			} 
	    		    echo "<td><a class='glyphicon glyphicon-comment'
	    		                 href='perChat.php?id= ".$row[5]." ' 
	    		    	         aria-hidden='true'></a></td>"; 
	    			echo "</tr>";
	    			$j++;
	    		}

	    	}

	    	/*学生身份*/
	    	else {                              
                $sql = "select isRead,content,time,teacher.tch_name, tch_id
                        from   tchMessage,teacher
                        where  tchMessage.fromTch = teacher.tch_id
                               and toStu = $tempUserId
                               and isDelete = 0
                        order by time desc
                        limit ". ($page-1)*$page_size .", $page_size";
                $res = mysql_query($sql);
                $j = 1;
                while($row = mysql_fetch_array($res)) {
                    if($j % 2 == 1) {   //隔行样式
                    	echo "<tr class='alt'>";
                    }
                    else {
                    	echo "<tr>";
                    }

                    if($row[0] == 0) {  //私信状态：未读
                    	echo "<td>未读 <span class='glyphicon glyphicon-ok-circle' 
                    	                aria-hidden='true'></span></td>";
                    }
                    else {
                    	echo "<td>已读 <span class='glyphicon glyphicon-ok-sign' 
                    	                aria-hidden='true'></span></td>";
                    }
                    
                    echo "<td class='alt'>$row[1]</td>";  //内容区设置固定宽度，防跳动感

                	for($i = 2; $i < 4; $i++) { 
                		echo "<td>$row[$i]</td>"; 
                	} 
                    echo "<td><a class='glyphicon glyphicon-comment'
                                 href='perChat.php?id= ".$row[4]." ' 
                    	         aria-hidden='true'></a></td>"; 
                	echo "</tr>";
                	$j++;
                }
	    	}

	    	

	  	?>
	    </tbody>
	 </table>

	 <?php 
	 	print "<div class='pagination'>".$page_string."</div>";
	  ?>
</div>
