<?php
header('Content-Type:text/html;charset=utf-8');
//通过GET参数接收文件名
$filename = isset($_GET['filename']) ? $_GET['filename'] : '';
//过滤文件名
$filename = preg_match('/\d+/',$filename, $filename) ? $filename[0].'.txt' : '';
//判断留言文件是否存在
if(!is_file($filename)){
	exit('留言文件不存在！');
}
//读取文本文件到字符串
$str = file_get_contents($filename);
//反序列化字符串到数组
$data = unserialize($str);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>文本留言板</title>
<style>
body{background-color:#eee;margin:0;padding:0;font-family:"simsun";}
.table{width:400px;margin:15px;padding:20px;border:1px solid #ccc;background-color:#fff;}
.table th{font-weight:normal;text-align:right;vertical-align:top;}
.table .title{text-align:center;padding-bottom:10px;}
</style>
</head>
<body>
<table class="table">
	<tr>
		<td class="title" colspan="2">留言内容</td>
	</tr>
	<tr><th>作者：</th><td><?php echo $data['author'];?></td></tr>
	<tr><th>邮箱：</th><td><?php echo $data['email'];?></td></tr>
	<tr><th>发表时间：</th><td><?php echo $data['time'];?></td></tr>
	<tr><th>留言内容：</th><td><?php echo $data['content'];?></td></tr>
</table>
</body>
</html>