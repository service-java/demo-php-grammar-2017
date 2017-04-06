<?php
	$q=$_REQUEST["q"];
	if(isset($_REQUEST["id"])) $id=$_REQUEST["id"];

	include("conn.php");
	switch($q){
		case "1":
			$sql="select id,college_name from colleges";
			break;
		case "2":
			$sql="select id,speciality_name from specialities where college_id=$id";
			break;
		case "3":
			$sql="select id,class_name from classes where speciality_id=$id";
			break;
	}

	$rs=mysqli_query($conn,$sql);
	if($q==1) echo "<option value='0'>请先选择学院</option>";
	while($row=mysqli_fetch_array($rs)){
		echo "<option value='".$row[0]."'>".$row[1]."</option>";
	}
?>