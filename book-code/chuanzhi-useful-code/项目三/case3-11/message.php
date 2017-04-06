<?php
header('Content-Type:text/html;charset=utf-8');
if(isset($_POST['author']) && isset($_POST['email']) && isset($_POST['content'])){
	$message = array(
		'author'  => $_POST['author'],       //作者
		'email'   => $_POST['email'],        //邮箱
		'time'    => date('Y-m-d H:i:s'),    //发表时间
		'content' => $_POST['content'],      //留言内容
	);
	//序列化数组
	echo serialize($message);
	exit('<p>留言成功。</p>');
}
exit('没有提交留言！');