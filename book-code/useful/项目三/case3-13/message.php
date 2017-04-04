<?php
header('Content-Type:text/html;charset=utf-8');
//生成文件名，根据时间戳和随机数
function createFileName(){
	return time().rand(1, 1000).'.txt';
}
//判断是否收到表单数据
if($_POST){
	//接收并转义
	$data = array('time'=>date('Y-m-d H:i:s'));
	foreach(array('author','email','content') as $v){
		$data[$v] = isset($_POST[$v]) ? htmlspecialchars($_POST[$v]) : '';
	}
	//通过lock.dat实现独占锁
	$fp = fopen('lock.dat', 'w'); 
	//取得独占锁定
	if (flock($fp, LOCK_EX)) {
		//在此处编写存在并发问题的代码
		$filename = createFileName();     //生成文件名
		//判断文件是否存在
		while(is_file($filename)){
			$filename = createFileName(); //重新生成文件名
		}
		//如果文件不存在就写入
		file_put_contents($filename, serialize($data));
		flock($fp, LOCK_UN);   //释放锁定
	}else{
		exit('文件不能锁定');
	}
	exit("<p>留言成功。</p><p>文件名：$filename</p>");
}
exit('没有提交留言！');