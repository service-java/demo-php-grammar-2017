<?php
# @Author: 骆金参
# @Date:   2017-03-19T17:31:23+08:00
# @Email:  1095947440@qq.com
# @Filename: form_select_multi.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-19T17:31:41+08:00

header("Content-type:text/html;charset=utf-8;");

// $q = isset($_GET['q'])? htmlspecialchars($_GET['q']) : '';
$q = isset($_POST['q'])? $_POST['q'] : ''; // 为空

// 判断是不是数组
if(is_array($q)) {
    $sites = array(
            'RUNOOB' => '菜鸟教程',
            'GOOGLE' => 'Google 搜索',
            'TAOBAO' => '淘宝',
    );

    // 到$sites数组比对
    foreach($q as $val) {
        echo $sites[$val] . PHP_EOL; // PHP_EOL 为常量，用于换行
    }

} else {
?>

<form action="" method="post">
    <select multiple="multiple" name="q[]">
    <!--  数组 -->
    <option value="">选择一个站点:</option>
    <option value="RUNOOB">Runoob</option>
    <option value="GOOGLE">Google</option>
    <option value="TAOBAO">Taobao</option>
    </select>
    <input type="submit" value="提交">
</form>

<?php
}
