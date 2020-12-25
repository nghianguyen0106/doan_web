<?php 
	$server_username 	= "id13992311_trungnhan";
	$server_password 	= "DH51700752_nhan";
	$server_host		= "localhost";
	$database			= "id13992311_qlmaytinh";

	$conn = mysqli_connect($server_host, $server_username, $server_password, $database) or die ("Can't connect to database");
	mysqli_query($conn,"SET NAMES 'UTF8'");
?>