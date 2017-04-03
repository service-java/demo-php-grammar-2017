<?php
# @Author: 骆金参
# @Date:   2017-03-18T01:29:54+08:00
# @Email:  1095947440@qq.com
# @Filename: form-basic.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-18T01:29:56+08:00


$q = isset($_GET['q'])? htmlspecialchars($_GET['q']) : ''; // 为空则下面 if(FALSE)
if($q) {
        if($q =='RUNOOB') {
                echo '菜鸟教程<br>http://www.runoob.com';
        } else if($q =='GOOGLE') {
                echo 'Google 搜索<br>http://www.google.com';
        } else if($q =='TAOBAO') {
                echo '淘宝<br>http://www.taobao.com';
        }
} else {
?>
<form action="" method="get">
    <select name="q">
      <option value="">选择一个站点:</option>
      <option value="RUNOOB">Runoob</option>
      <option value="GOOGLE">Google</option>
      <option value="TAOBAO">Taobao</option>
    </select>
    <input type="submit" value="提交">
</form>

<?php
}
