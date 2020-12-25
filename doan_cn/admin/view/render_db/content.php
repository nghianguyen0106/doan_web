<?php 
	if($_SESSION['admin']['adTinhtrang']!=0)
	{
		$_SESSION['mes']="Tài khoản này đã bị khóa !";
		header('location:login.php');
	}
	if(isset($_GET['quanly']))
	
		$row = $_GET['quanly'];
	
	else { $row = ""; }
	if($row == "tbl_admin") { include('tbl_admin.php'); }
	else if($row == "tbl_customer") { include('tbl_customer.php'); }
	else if($row == "tbl_product") { include('tbl_product.php'); }
	else if($row == "tbl_order") { include('tbl_order.php'); }
	else if($row == "tbl_type") { include('tbl_type.php'); }
	else if($row == "tbl_brand") { include('tbl_brand.php'); }
	else if($row == "tbl_order") { include('tbl_order.php'); }

?>