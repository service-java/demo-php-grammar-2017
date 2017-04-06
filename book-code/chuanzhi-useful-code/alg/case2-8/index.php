<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>打印空心菱形</title>
<style> 
.box{width:118px;background-color:#000;margin:3px auto;font-size:24px;font-weight:bold;color:#FFFF00;}
.out{border:solid 2px #000;width:125px;margin:3px auto;}
.out1{border:solid 2px #000;width:135px;margin:3px auto; }
.out2{border:solid 3px #000;width:145px;margin:0 auto; }
</style>
</head>
<body>
	<div class="out2">
	<div class="out1">
	<div class="out">
	<div class="box">
		<?php
			//循环菱形的上半部分5行
			for($line=1; $line<=5; ++$line){
				//输出空格
				for($pos=1, $max=5-$line; $pos<=$max; ++$pos){
					echo '&nbsp;';
				}
				//输出星星
				for($pos=1, $max=2*$line-1; $pos<=$max; ++$pos){
					//判断当前星星是否为该行的第1个或最后1个星星
					if($pos==1 || $pos==$max){
						echo '*';
					}else{
						echo '&nbsp;';
					}
				}
				echo '<br>';
			}
			//循环菱形的下半部分
			for($line=4; $line>=1; --$line){
				//输出空格
				for($pos=5-$line; $pos>=1; --$pos){
					echo '&nbsp;';
				}
				//输出星星
				for($pos=1, $max=2*$line-1; $pos<=$max; ++$pos){
					//判断当前星星是否为该行的第1个或最后1个星星
					if($pos==1 || $pos==$max){
						echo '*';
					}else{
						echo '&nbsp;';
					}
				}
				echo '<br>';
			}
		?>
	</div>
	</div>
	</div>
	</div>
 </body>
</html>