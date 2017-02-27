<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :校友的列表
    Update    : 
-->


<?php 
  echo header("Content-Type:text/html;charset=utf-8");  //保证中文输出
  $sql ="select  real_Name, enter_Year, class_Name
         from student, class
         where student.class_Id = class.class_Id
             and student.isuse = 1;";
	$res = mysql_query($sql);
?>


<!-- <meta charset="utf-8"> -->
<table class="person_list" style="margin-top: 10px;">
    <thead>
        <tr class="table_top_line">
          	<th>校友名</th>
          	<th>入学年份</th>
          	<th>班级名</th>
      	</tr>
  	</thead>
    <tbody>
    <?php
      echo header("Content-Type:text/html;charset=utf-8");  //保证中文输出
   		$i = 0;
   		while($row = mysql_fetch_array($res)) {
   		    if($i%2 === 0) {
         		echo "<tr class='alt'>";
          }
          else {
         		echo "<tr>";
   		    }
          for($j=0;$j<3;$j++) {
            echo "<td>".$row[$j]."</td>";
          }
          echo "</tr>";
     		  $i++;
   		}

   		//关闭数据库连接
   		mysql_close();
  	?>
    </tbody>
 </table>
