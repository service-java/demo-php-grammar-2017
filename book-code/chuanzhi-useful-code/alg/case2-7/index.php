<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>打印菱形</title>
<style> 
.box{width:118px;background-color:#000;margin:3px auto;font-size:24px;font-weight:bold;color:#00ff00;}
.out{border:solid 2px #000;width:125px;margin:2px auto;}
.out1{border:solid 3px #000;width:135px;margin:0px auto;}
</style>
</head>
<body>
<div class="out1">
	<div class="out">
		<div class="box">
		<?php
			//循环菱形的上半部分5行
			$a=5;//控制循环的行数
			//循环菱形的上半部分
			for($i=1; $i<=$a; ++$i) {
				//$b代表空格数目
				for($b=1; $b<=$a-$i; ++$b) {
					//控制输出的空格数
					echo '&nbsp;';
				}
				//$c 代表星号数目
				for($c=1; $c<=($i-1)*2+1; ++$c){
					//控制输出的*数目
					echo '*';
				}
				echo '<br/>';
			}

			//循环菱形的下半部分
			for($i=$a-1; $i>=1;--$i){
				//$b代表空格数目
				for($b=1; $b<=$a-$i; ++$b){
					//控制输出的空格数
					echo '&nbsp;';
				}
				//$c 代表星号数目
				for($c=1; $c<=($i-1)*2+1; ++$c){
					echo '*';
				}
				echo '<br/>';
			}
		?>
		</div>
	</div>
</div>
</body>
</html>