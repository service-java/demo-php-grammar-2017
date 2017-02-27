<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :管理员的列表
    Update    : 
-->



<?php 
  echo header("Content-Type:text/html;charset=utf-8");  //中文输出
	$sql="SELECT student_Id,real_Name,card_No,enter_Year,class_Id,mobile,address 
        FROM student
        WHERE isuse = 1";
	$res = mysql_query($sql);
?>

<table class="person_list">
    <thead>
        <tr class="table_top_line">
          	<th>学生id</th>
          	<th>真名</th>
          	<th>卡号</th>
          	<th>入学年月</th>
          	<th>班级号</th>
          	<th>手机</th>
          	<th>住址</th>
            <th>操作</th>
      	</tr>
  	</thead>
    <tbody>
    <?php
      echo header("Content-Type:text/html;charset=utf-8");  //保证中文输出
   		$i = 0;
   		while($row = mysql_fetch_array($res)) {
   		    if($i%2 === 0) {
           		echo "<tr class='alt'>";
           		echo "<td>".$row['student_Id']."</td>";
  		        echo "<td>".$row['real_Name']."</td>";
  		        echo "<td>".$row['card_No']."</td>";
  		        echo "<td>".$row['enter_Year']."</td>";
  		        echo "<td>".$row['class_Id']."</td>";
  		        echo "<td>".$row['mobile']."</td>";
  		        echo "<td>".$row['address']."</td>";
          }
          else {
           		echo "<tr>";
           		echo "<td>".$row['student_Id']."</td>";
           		echo "<td>".$row['real_Name']."</td>";
           		echo "<td>".$row['card_No']."</td>";
           		echo "<td>".$row['enter_Year']."</td>";
           		echo "<td>".$row['class_Id']."</td>";
           		echo "<td>".$row['mobile']."</td>";
           		echo "<td>".$row['address']."</td>"; 		
   		    }
          echo "<td>
              <a class='glyphicon glyphicon glyphicon-pencil' 
                 href='edit.php?id=".$row['student_Id']."' aria-hidden='true'></a>
              <a class='glyphicon glyphicon-trash' 
                 href='func/change_Isuse.php?id= ".$row['student_Id']."' aria-hidden='true'>
                 </a>
               </td>";
          echo "</tr>";
       		$i++;
   		}

   		mysql_close();  //关闭数据库连接
  	?>
    </tbody>
 </table>
