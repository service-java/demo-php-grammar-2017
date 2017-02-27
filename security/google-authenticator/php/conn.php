<?php
	$conn = new mysqli ("localhost", "root","ljc578762","user");
	if (mysqli_connect_error())
	{
	  printf("Connect failed: %s\n",mysqli_connect_error());
	  exit;
	}
	$sql = "set names 'utf8'";
    mysqli_query($conn,$sql);
?>