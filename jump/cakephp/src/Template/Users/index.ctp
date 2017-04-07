<?php
  $this->assign('title', '显示用户基本信息');
  // $this->layout = 'index';
 ?>

<h4>用户基本信息</h4>
<ul>
  <li>姓名 : <?php echo h($name); ?> </li>
  <li>性别 : <?php echo h($gender); ?> </li>
  <li>年级 : <?php echo h($grade); ?> </li>
  <li>爱好 : <?php echo h($favorite); ?> </li>
</ul>

<?php

foreach($result as $row) {
  echo $row->name , " : ";
  echo $row->gender, "<br>";
}
