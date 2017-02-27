<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 群发区 
    Update    : 
-->

<style>
	.form-inline {
		margin-top: 10px;
	}
	.form-inline select {
        margin-top: 4px;
	}
	.form-inline button {
        margin-top: 4px;
	}
	.form-inline span {
		padding: 8px 25px 12px 29px;
	}

</style>


<div class="container">
    <!-- 群发表格 -->
	<form class="form-inline"
	      action="func/get_groupChat.php"
	      method="post">
	  <div class="form-group">
	    <textarea class="form-control" rows="5" cols="60"  id="content" name="content">同学们好！
	    </textarea>
	  </div> <br>
	  <select class="form-control" id="class_id" name="class_id">
	    <?php 
	      require("func/conn.php");
	      $tempUserId = (int)$_SESSION['userId'];

	      $sql = "select teach.class_id, class_name  
	              from   class, teach  
	              where tch_id = $tempUserId  
	                    and class.class_id = teach.class_id;";
	      $res = mysql_query($sql);
	      while($row = mysql_fetch_array($res)) {
	        echo "<option value='".$row['class_id']."'>".$row['class_name']."</option>";
	      } 
	     ?>
	  </select>
	  <button type="submit" class="btn btn-info">群发</button>
	  <button type="reset"  class="btn btn-default">重写</button>
<!-- 	  <span class="label label-default" style="background:#72B25F">
	         注意:消息发送给该班学生后无法撤回。</span> -->

	</form>
</div>