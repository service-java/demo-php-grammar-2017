<?php
header('Content-Type:text/html;charset=utf-8');
require('./MySQLPDO.class.php');

$db = MySQLPDO::getInstance(array('user'=>'root','pass'=>'root','dbname'=>'article089')); // 单例
$error = array(); // 保存错误信息

// 查询单行
$sql = "select `title`,`content`,`author`
        from `cms_article`
        where `id` = 2 ";
$rst = $db->fetchRow($sql);
echo $rst['title'];

// 删除与更新示例
// $sql = "delete from `cms_article`
//         where `id`= 2";
// $db->query($sql);


$sql = 'select `id`,`author`,`content`
        from `cms_article`
        order by addtime desc';
$all = $db->fetchAll($sql);

?>

<style>
  th, td {
    border: 1px, solid;
  }
</style>

<table style="border-collapse: collapse;">
	<tr><td>作者</td><td>内容</td><td>操作</td></tr>
	<?php foreach($all as $v):?>
	<tr>
		<td><input type="text" name="id[<?php echo $v['id'];?>]" value="<?php echo $v['author'];?>"></td>
		<td><?php echo $v['content'];?></td>
		<td><a href="?id=<?php echo $v['id'];?>&a=category_del" onclick="{if(confirm('确定要删除该文章吗?')){return true;}return false;}">删除</a> | 编辑</td></tr>
	<?php endforeach;?>
</table>

<?php

// 批量操作
// $ids = isset($_POST['ids']) ? $_POST['ids'] : array();
// $data = array();
// foreach((array)$ids as $k=>$v){
// 	$data[] = array(
// 		'id' => (int)$k,
// 		'status' => (int)$v
// 	);
// }
// $sql = "update `imedia` set `status`=:status where `id`=:id";
// $db->data($data)->query($sql,true); // 批量操作注意加上true
