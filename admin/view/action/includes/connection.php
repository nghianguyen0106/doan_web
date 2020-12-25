<?php 
	$server_username 	= "id15750577_demo";
	$server_password 	= "DH51700752_demo";
	$server_host		= "localhost";
	$database			= "id15750577_qlmaytinh";

	$conn = mysqli_connect($server_host, $server_username, $server_password, $database) or die ("Can't connect to database");
	mysqli_query($conn,"SET NAMES 'UTF8'");
?>