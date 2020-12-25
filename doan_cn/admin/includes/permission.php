<?php 
	if(!isset($_SESSION["admin"]))
	{
		header('location:login.php');
	}
	else
	{
		if(isset($_SESSION["admin"]["adQuyenn"]))
		{
			$per = $_SESSION["admin"]["adQuyen"];
			if($per == "0")
			{
				echo "You're not admin!";
				echo "<a href='index.php'> Click to login page</a>";
				exit();
			}
		}

	}
?>