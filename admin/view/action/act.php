<?php 
if(isset($_GET["hanhdong"]))
{
	$row = $_GET["hanhdong"];
}
else { $row = ""; }
if($row == "add_admin") { include("add_admin.php"); }
else if($row == "add_customer") { include("add_customer.php"); }
else if($row == "add_product") { include("add_product.php"); }
else if($row == "add_type") { include("add_type.php"); }
else if($row == "add_brand") { include("add_brand.php"); }
else if($row == "edit_admin") { include("edit_admin.php"); }
else if($row == "edit_product") { include("edit_product.php"); }
else if($row == "edit_customer") { include("edit_customer.php"); }
else if($row == "edit_type") { include("edit_type.php"); }
else if($row == "edit_brand") { include("edit_brand.php"); }
else if($row == "pay") { include("pay.php"); }
?>