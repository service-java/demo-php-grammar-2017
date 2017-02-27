<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-13
    Version   :1.0
    Function  :Qmen' 私信管理区 
    Update    : 
-->

<style>
  .manageList {
    margin-left: 15px;
  }
  .manageList th.alt {
    width: 325px;
  }
  .manageList td {
    padding:4px 8px 4px 8px;
  }
  .manageList th {
    border-bottom: 1px dotted;
    padding:4px 8px 4px 8px;
  }
  .manageList td.alt {
    width: 325px;
  }
  .manageList tr.alt {
    background: #CAECEE;
  }
  #resetBtn  {
    margin-left: 400px;
    margin-top: 4px;
  }
  #selectAllBtn  {
    margin-left: 3px;
    margin-top: 4px; 
  }
  #collectBtn  {
    margin-left: 3px;
    margin-top: 4px;
  }
  #deleteBtn  {
    margin-left: 3px;
    margin-top: 4px; 
  }
</style>

<div class="container">
  <form action="func/get_manageList.php" 
        method="get" 
        accept-charset="utf-8">

      <table class="manageList">
          <thead>
              <tr>
                <th>多选</th>
                <th>状态</th>
                <th class="alt">私信内容</th>
                <th>来源</th>
                <th>时间</th>
              </tr>
          </thead>
          <tbody>
              <?php 
                  $tempUserId = (int)$_SESSION['userId'];
                  require("func/conn.php");  //连接数据库
    $sql =  "select message_no,isCollected,content,stu_name,time
             from   stuMessage,student
             where  stuMessage.fromStu = student.stu_id
                    and toTch = $tempUserId 
                    and isDelete = 0 "; 

    /* *****根据查询条件类型自由组合***** */
    $sql2 =  "select message_no,isCollected,content,tch_name,time
             from   tchMessage,teacher
             where  tchMessage.fromTch = teacher.tch_id
             and toStu = $tempUserId 
             and isDelete = 0 ";
    $str1 = " and timestampdiff(hour, time, CURRENT_TIMESTAMP) < ".$_SESSION['timeLimit']."*24";
    $str2 = " and fromStu = ".$_SESSION['from']." ";
    $str2_2 = " and fromTch = ".$_SESSION['from']." ";
    $str3 = " and isCollected = ".$_SESSION['isCollected']." ";

    /*教师身份*/
    if($_SESSION['userKind'] == 1) {  
      if($_SESSION['isCollected'] == -1) {  
          if($_SESSION['from'] == -1) { 
              if($_SESSION['timeLimit'] == -1)  $sql = $sql." order by time desc;";
              else                              $sql = $sql.$str1." order by time desc;";
          }
          else {
              if($_SESSION['timeLimit'] == -1)  $sql = $sql.$str2." order by time desc;";
              else                              $sql = $sql.$str1.$str2." order by time desc;";
          }
      }

      else {
          if($_SESSION['from'] == -1) { 
              if($_SESSION['timeLimit'] == -1)  $sql = $sql.$str3." order by time desc;";
              else                              $sql = $sql.$str1.$str3." order by time desc;";
          }
          else {
              if($_SESSION['timeLimit'] == -1)  $sql = $sql.$str2.$str3." order by time desc;";
              else                       $sql = $sql.$str1.$str2.$str3." order by time desc;";
          }
      }
    }


    else {  
        if($_SESSION['isCollected'] == -1) {  
            if($_SESSION['from'] == -1) { 
                if($_SESSION['timeLimit'] == -1)  $sql2 = $sql2." order by time desc;";
                else                              $sql2 = $sql2.$str1." order by time desc;";
            }
            else {
                if($_SESSION['timeLimit'] == -1)  $sql2 = $sql2.$str2_2." order by time desc;";
                else                        $sql2 = $sql2.$str1.$str2_2." order by time desc;";
            }
        }

        else {
            if($_SESSION['from'] == -1) { 
                if($_SESSION['timeLimit'] == -1)  $sql2 = $sql2.$str3." order by time desc;";
                else                        $sql2 = $sql2.$str1.$str3." order by time desc;";
            }
            else {
                if($_SESSION['timeLimit'] == -1)  $sql2 = $sql2.$str2_2.$str3." order by time desc;";
                else                        $sql2 = $sql2.$str1.$str2_2.$str3." order by time desc;";
            }
        }
    }




                  if($_SESSION['userKind'] == 1)  $res = mysql_query($sql);
                  else                            $res = mysql_query($sql2);
                   

                  $i = 0;
                  while($row = mysql_fetch_array($res)) {
                      if($i % 2 == 0)  echo "<tr class='alt'>";
                      else             echo "<tr>";
                      $i++;
                      echo " <td>
    <input type='checkbox' aria-label='true' name='choice[]' value = '".$row[0]."'>
                             </td>";
                      if($row[1] == 0) {
                          echo "<td>
                  <a  href = 'func/change_collect.php?id=$row[0]'
                      class='glyphicon glyphicon-star-empty' aria-hidden='true'
                      ></a>
                                </td>";
                      }
                      else {
                           echo "<td>
                  <a  href = 'func/change_collect.php?id=$row[0]' 
                      class='glyphicon glyphicon-star' aria-hidden='true'></a>
                                </td>";
                      }
                      echo "<td class='alt'>".$row[2]."</td>";
                      echo "<td>".$row[3]."</td>";
                      echo "<td>".$row[4]."</td>";
                      echo "</tr>";
                  }
               ?>
          </tbody>
       </table>
       <hr class="col-sm-7">
       <button type="reset"  id = "resetBtn"    class="btn btn-default">重选</button>
       <button type="button" id = "selectAllBtn"  class="btn btn-primary">全选</button>
       <button type="submit" id = "collectBtn"  class="btn btn-success" 
                              name = "submitType" value="collect">收藏</button>
       <button type="submit"   onclick="return confirm('确定删除吗?')" 
               id = "deleteBtn"   class="btn btn-warning" 
                              name = "submitType" value="delete">删除</button>
   </form>
</div>

<script>
      var selectAllBtn = document.getElementById('selectAllBtn');
      selectAllBtn.addEventListener("click", select_all, false);
      function select_all() { //全选     
          var inputs = document.getElementsByTagName("input");     
          for(var i=0;i<inputs.length;i++)     
          {     
            if(inputs[i].getAttribute("type") == "checkbox")     
            {     
              inputs[i].checked = true;     
            }     
          }     
      } 
</script>
