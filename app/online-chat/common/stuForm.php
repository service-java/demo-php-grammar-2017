<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 学生个人设置区
    Update    : 
-->

<style>

	#stuContentForm {
		margin-top: 20px;
	}
	#stuImgForm  {
        margin-top: 20px;
	}
	#chatBtn {
		margin-left: -5px;
	}

</style>

<div class="container">
    <div class = "col-sm-7">
		<form class="form-horizontal " 
		      action = "func/get_contentForm.php"
		      method="post" 
		      enctype="multipart/form-data"
		      id = "stuContentForm">

		 <div class="form-group">
		   <label for="name" class="col-sm-2 control-label">我的姓名</label>
		   <div class="col-sm-8">
		     <input class="form-control" id="name" name="name">
		   </div> 
	     </div>
		  <div class="form-group">
		    <label for="business" class="col-sm-2 control-label">发展方向</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="business" name="business">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="pwd" class="col-sm-2 control-label">修改密码</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="pwd" name="pwd" placeholder="必填">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="mobile" class="col-sm-2 control-label">手机号</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="请输入  11位有效手机号码">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="address" class="col-sm-2 control-label">通讯地址</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="address" name="address" placeholder="请输入  通讯地址">
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-info" value="修改">修改信息</button>
		    </div>
		  </div>

		  <?php 
            $tempUserId = (int)$_SESSION['userId'];
	        require("func/conn.php");  //连接数据库
	        $sql ="select stu_name, business, stu_pwd, mobile, address
	               from student
	               where stu_id = ".$tempUserId." ;";
	        $res = mysql_query($sql);
	        $row = mysql_fetch_array($res);
	        echo "<script>";    
	        echo "document.getElementById('name').value='".$row['stu_name']."';";
	        echo "document.getElementById('pwd').value='".$row['stu_pwd']."';";
	        echo "document.getElementById('mobile').value='".$row['mobile']."';";
	        echo "document.getElementById('business').value='".$row['business']."';";
	        echo "document.getElementById('address').value='".$row['address']."';";

	        echo "</script>";

	        mysql_close();
		    
		   ?>
		</form>
	    
	    <form class="form-horizontal" 
		      action = "func/get_otherChatForm.php"
		      method="post" 
		      enctype="multipart/form-data"
		      id = "otherChatForm">
	    	<div class="form-group">
	    	  <label for="tch_name" class="col-sm-2 control-label">我的老师</label>
	    	  <div class="col-sm-6">
	    	      <select class="form-control" id="tch_id" name="tch_id">
	    	        <?php 
	    	          include("func/conn.php");  //连接数据库
	    	          $tempUserId = $_SESSION['userId'];
	    	          $sql = "select teacher.tch_id, teacher.tch_name 
	    	                  from   student, class, teach, teacher
	    	                  where  class.class_id = teach.class_id
	    	                     and teach.tch_id = teacher.tch_id
	    	                     and student.class_id = class.class_id
	    	                     and stu_id = $tempUserId;";
	    	          $res = mysql_query($sql);
	    	          while($row = mysql_fetch_array($res)) {
	    	            echo "<option value='".$row[0]."'>".$row[1]."</option>";
	    	          } 
	    	         ?>
	    	      </select>
	    	  </div>
	    	  <div class="col-sm-4">
	    	    <button type="submit" class="btn btn-success" 
	    	            id = "chatBtn" value="聊天">与TA聊天</button>
	    	  </div>
	    	</div>
	    </form>

    </div>
	

    <form class="form-horizontal col-sm-5" 
          action="func/get_imgForm.php"
          method="post" 
          enctype="multipart/form-data"
          id = "stuImgForm">
        <div class="form-group">
            <label for="pic">预览头像</label> <br>
            <img id="pic" src="" alt="图片在此显示" height="195px"/>
        </div>
        <div class="form-group">
            <label for="file4">上传图片</label>  
            <input class="btn btn-default" type="file" id="file"  name="file">
            <input class="btn btn-default" type="submit" name="submit" value="上传">
        </div>

        <?php 
            require("func/conn.php");
            $tempUserId = $_SESSION['userId'];
            $sql = "select image 
                    from  student 
                    where stu_id =  ".$tempUserId.";";
            $res = mysql_query($sql);
            $row = mysql_fetch_array($res);
            echo "<script>";
            echo "window.document.getElementById('pic').src= '".$row['image']."';"; 
            echo "</script>";

         ?>
    </form> 


</div>
