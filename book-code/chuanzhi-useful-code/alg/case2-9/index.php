<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>编程求水仙花数</title>
<style> 
h2{text-align:center;color:#222;}
.box{width:210px;background:url('./image/01.jpg');margin:3px auto;font-size:18px;font-weight:bold;padding:20px;text-align:left;}
 </style>
 </head>
 <body>
<h2>求100~999之间的水仙花数</h2>
<div class="box">
	<?php
		for($i=100; $i<1000; ++$i){
			$hundreds=floor($i/100);  //分解出百位
			$tens=floor($i/10)%10;    //分解出十位
			$ones=floor($i%10);       //分解出个位
			if(pow($hundreds,3)+pow($tens,3)+pow($ones,3)==$i){
				echo $i.' ';
			}
		}	
	?>
</div>
</body>
</html>