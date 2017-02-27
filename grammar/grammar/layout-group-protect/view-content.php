<?php
if(!defined('INDEX')) exit('request refused!');

$books = array('php.jpg','java.jpg','ps.jpg','oc.jpg','android.jpg','sql.jpg');
?>
<div class="lst">
	<?php foreach($books as $book): ?>
		 <div class="pic">
			<img src="./img/<?php echo $book;?>">
		 </div>
	<?php endforeach;?>
	<div style="clear:both"></div>
</div>