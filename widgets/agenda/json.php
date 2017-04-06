<?php
include_once('include/config.php');//连接数据库

@$sql = "select * from `agenda`";

@$result = mysql_query($sql);
@$str = "[";
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
	@$start = strtotime($row['starttime']);
	@$end = strtotime($row['endtime']);
	@$isallday = $row['allday'];
	@$isend = $row['end'];
	
	$str = $str ."{";
	$str = $str .'"id":' . ''.$row['id'].',';
	$str = $str .'"title":' . '"'.$row['title'].'",';
	
	if ($isallday == 1 && $isend==1)
	{
		$str =$str . '"start":' . '"'. date("Y-m-d",$start) .'",';
		$str =$str . '"end":' . '"'. date("Y-m-d",$end) .'"';
	}elseif ($isallday==1 && $isend==0){
		$str =$str . '"start":' . '"'. date("Y-m-d",$start) .'"';
	}elseif($isallday==0 && $isend==1){
		$str =$str . '"start":' . '"'. date("Y-m-d",$start) .'T'. date('H:i:s',$start) .'",';
		$str =$str . '"end":' . '"'. date("Y-m-d",$end) .'T'. date('H:i:s',$end) .'"';
	}else{
		$str =$str . '"start":' . '"'. date("Y-m-d",$start) .'T'. date('H:i:s',$start) .'"';
	}
	
	$str = $str . "}";
	$str = $str . ",";

} 
$str = substr ($str, 0,strlen($str) - 1);
$str = $str . "]";
echo $str; 
?>