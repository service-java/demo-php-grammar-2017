<!--     
    Author    :骆金参(Luo_0412)
    BuildDate :2016-5-7
    Version   :1.0
    Function  :图片上传区
    Update    : 
-->


<form class="form-horizontal col-md-5 col-md-offset-1" 
      action="func/upload_File.php"
      method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="pic4">预览图片</label> <br>
        <img id="pic4" src="" alt="图片在此显示" height="291px"/>
    </div>
    <div class="form-group">
        <label for="file4">上传图片</label>  
        <input class="btn btn-default" type="file" id="file4"  name="file">
        <input class="btn btn-default" type="submit" name="submit" value="上传">
    </div>

    <?php 
        if($_SESSION['userkind'] != '1') {  //校友，修改信息，加载图片
            require("func/conn.php");
            $sql = "select image 
                    from student 
                    where student_Name = '".$_SESSION['username']."';";
            $res = mysql_query($sql);
            $row = mysql_fetch_array($res);
            echo "<script>";
            echo "window.document.getElementById('pic4').src='".$row['image']."';"; 
            echo "</script>";
        }
        else { 
            if(isset($_SESSION['userimage'])) {  //管理员，上传过图片的显示
                echo "<script>";
                echo "window.document.getElementById('pic4').src='".$_SESSION["userimage"]."';"; 
                echo "</script>";
            }

        }

     ?>
</form> 