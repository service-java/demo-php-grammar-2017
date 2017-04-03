* 用户信息管理系统

```
本地数据
.htaccess保护

验证码的生成

// 上传刷新不及时
```

* 文章评论系统

```
css/image/uploads
view 视图

lib
umeditor       // 不支持上传附件，建议不要用了
MySQLPDO.class.php
page.class.php // 只是上下页式的

要先创建数据库 article089
```

* 学生信息管理

```
采用thinkphp
Common/conf/config.php 配置数据库信息
用户名 admin
密码  123456

先创建数据库stuinfo897

// 访问地址
http://localhost/hello-php/app/stuinfo-manage-sys/index.php/admin/index/login.html

// 如果有报错，试着把Application/Runtime文件删除

// composer安装
```

* 补充知识

```
//全选
document.getElementById("checkAll").onclick = function(){
	var ids = document.getElementsByName("id[]");
	for(var i in ids){
		ids[i].checked = true;
	}
	return false;
};
//反选
document.getElementById("checkReverse").onclick = function(){
	var ids = document.getElementsByName("id[]");
	for(var i in ids){
		ids[i].checked = !ids[i].checked;
	}
	return false;
};


// 批量删除
$ids = isset($_POST['id']) ? $_POST['id'] : false;
if(!is_array($ids)){
	exit('删除失败：没有选择数据。');
}
//过滤输入数组
foreach($ids as $k=>$v){
	$ids[$k] = (int)$v;
}

//方式一：使用where批量删除

$sql = 'delete from `news` where id in ('.implode(',',$ids).')';
$pdo->query($sql);

//方式二：使用PDO批量处理
/*
$sql = 'delete from `news` where `id`=:id';
$stmt = $pdo->prepare($sql);
foreach($ids as $v){
	$stmt->execute(array('id'=>$v));
}
*/


//开启调试模式
define('DB_DEBUG',true);
```

* jQuery日历插件

```
<link rel="stylesheet" href="./js/jquery.datetimepicker.css" />
<script src="./js/jquery.js"></script>
<script src="./js/jquery.datetimepicker.js"></script>


//jQuery日历插件
$(function(){
	var options = {lang:'ch',format:'Y-m-d',timepicker:false};
	$('#birth').datetimepicker(options);
	$('#entry').datetimepicker(options);
});
```
