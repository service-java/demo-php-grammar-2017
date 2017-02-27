<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 私信搜索区 
    Update    : 
-->

<div class="container">

  <form action = "func/get_searchForm.php"
        method="post" 
        enctype="multipart/form-data">

    <div class="form-group">

      <div class="col-sm-2">
        <div class="input-group">
	        <span class="input-group-btn">
	          <button class="btn btn-default" type="button">状态</button>
	        </span>
		    <select class="form-control" id="isCollected" name="isCollected">
		      <option value="-1"></option>
		      <option value="1">收藏</option>
		      <option value="0">未收藏</option>
		    </select>
	    </div>
      </div>
      <div class="col-sm-2">
        <div class="input-group">
	        <span class="input-group-btn">
	          <button class="btn btn-default" type="button">来源</button>
	        </span>
		    <select class="form-control" id="from" name="from">
		      <?php 
		        $tempUserId = (int)$_SESSION['userId'];
		        if($_SESSION['userKind'] == 1) {
		        	$sql = "select distinct stu_name,stu_id 
		        	        from student,stuMessage
		        	        where student.stu_id = stuMessage.fromStu
		        	              and toTch = $tempUserId
		        	              and isDelete = 0 ;";
		        	$res = mysql_query($sql);
		        	echo "<option value='-1'></option>";
		        	while($row = mysql_fetch_array($res)) {
		        	  echo "<option value='".$row['stu_id']."'>".$row['stu_name']."</option>";
		        	} 
		        }
		        else {
		        	$sql = "select distinct tch_name,tch_id 
		        	        from teacher,tchMessage
		        	        where teacher.tch_id = tchMessage.fromTch
		        	              and toStu = $tempUserId
		        	              and isDelete = 0 ;";
		        	$res = mysql_query($sql);
		        	echo "<option value='-1'></option>";
		        	while($row = mysql_fetch_array($res)) {
		        	  echo "<option value='".$row['tch_id']."'>".$row['tch_name']."</option>";
		        	} 
		        }

		       ?>
		    </select>
	    </div>
      </div>
      <div class="col-sm-2">
        <div class="input-group">
	        <span class="input-group-btn">
	          <button class="btn btn-default" type="button">时间</button>
	        </span>
		    <select class="form-control" id="timeLimit" name="timeLimit">
		      <option value="1">1天内</option>
		      <option value="3">3天内</option>
		      <option value="-1">全部</option>
		    </select>
	    </div>
      </div>
      
      <div class="col-sm-2">
        <button type="submit" class="btn btn-info" value="">查询</button>
      </div>
    </div>
  </form>

</div>
