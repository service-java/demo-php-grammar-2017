<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :搜索结果列表
    Update    : 
-->


<?php
  // session_start(); 
  if($_SESSION['choice'] == "real_Name") {
      $sql ="select distinct real_Name, enter_Year, class_Name
             from student, class
             where student.class_Id = class.class_Id 
                and  student.isuse = 1 
                and real_Name = '".$_SESSION['keyword']."';";
  }
  else if($_SESSION['choice'] == "enter_Year") {
      $sql ="select distinct real_Name, enter_Year, class_Name
             from student, class
             where student.class_Id = class.class_Id 
                and  student.isuse = 1 
                and  enter_Year = ".$_SESSION['keyword'].";";
  }
  else if($_SESSION['choice'] == "class_Name") {
      $sql ="select distinct real_Name, enter_Year, class_Name
             from student, class
             where student.class_Id = class.class_Id 
                and  student.isuse = 1  
                and  class_Name= '".$_SESSION['keyword']."';";
  }
	$res = mysql_query($sql);
?>


<!-- <meta charset="utf-8"> -->
<table class="person_list">
    <thead>
        <tr class="table_top_line">
          	<th>校友名</th>
          	<th>入学年份</th>
          	<th>班级名</th>
      	</tr>
  	</thead>
    <tbody>
    <?php
      // echo header("Content-Type:text/html;charset=utf-8");  //保证中文输出
   		$i = 0;
   		while(@$row = mysql_fetch_array($res)) {
   		    if($i%2 === 0) {
         		echo "<tr class='alt'>";
         		echo "<td>".$row['real_Name']."</td>";
  	        echo "<td>".$row['enter_Year']."</td>";
  	        echo "<td>".$row['class_Name']."</td>";
          }
          else {
         		echo "<tr>";
            echo "<td>".$row['real_Name']."</td>";
            echo "<td>".$row['enter_Year']."</td>";
            echo "<td>".$row['class_Name']."</td>";
   		    }
          echo "</tr>";
     		  $i++;
   		}

   		//关闭数据库连接
   		mysql_close();
  	?>
    </tbody>
 </table>
