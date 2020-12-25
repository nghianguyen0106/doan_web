<?php 

	if(isset($_GET['show']))
	
		$row = $_GET['show'];
	
	else { $row = ""; }
	if($row == "show_laptop") { include('show_laptop.php'); }
	else if($row == "show_PC") { include('show_PC.php'); }
	else if($row == "show_info") { include('show_info.php'); }
	else if($row == "edit_info"){ include('edit_info.php'); }
	else if($row == "show_detail"){ include('show_detail.php'); }




?>