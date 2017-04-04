<?php
header('Content-Type:text/html;charset=utf-8');
//判断是否有文件上传
if(empty($_FILES['file'])){
	exit('没有文件上传');
}
//判断文件上传是否有错误
if ($_FILES['file']['error'] > 0) {
    exit('上传文件有误！');
}
//输出文件信息
echo '文件的名称：' . $_FILES['file']['name'] . '<br/>';
echo '文件的类型：' . $_FILES['file']['type'] . '<br/>';
echo '文件的大小：' . $_FILES['file']['size'] . 'Kb<br/>';
echo '文件的临时路径：' . $_FILES['file']['tmp_name'] . '<br/>';
//判断文件是否已经存在
if (file_exists('./upload' . $_FILES['file']['name'])) {
    die('文件已经存在！');
}
//文件名称的编码转换（用于Windows系统正确显示中文）
$saveFilePath = iconv('UTF-8', 'GBK//IGNORE','./upload/' . $_FILES['file']['name']);
//上传图片
if (move_uploaded_file($_FILES['file']['tmp_name'], $saveFilePath)) {
    echo '上传成功:./upload/' . $_FILES['file']['name'] . '<br />';
    echo '<img src="./upload/' . $_FILES['file']['name'] . '" /><br />';
} else {
    die('上传错误！');
}