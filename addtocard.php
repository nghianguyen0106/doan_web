<?php 
	session_start();
	error_reporting(0);
$tinhtrang=$_GET['tinhtrang'];

$tam= isset($_SESSION['cart'])?$_SESSION['cart']:[];
$action= isset($_GET['action'])?$_GET['action']:'';
if ($action=='add')
{
	if($tinhtrang!=0)
	{
		$spMa= isset($_GET['spMa'])?$_GET['spMa']:'';
		$soluong = 1;
		if ($spMa!='')
		{
			if (isset($tam[$spMa]))
				$tam[$spMa] += $soluong;
			else 
				$tam[$spMa] = $soluong;
		}
		$_SESSION['cart']= $tam;

  	  	echo "<script>location.href='index.php';</script>";
	}
	else
	{
		 echo "<script>location.href='index.php?alertoutofstock=1';</script>";
	
	}
	
}


if ($action=='tang')
{
	$spMa= isset($_GET['spMa'])?$_GET['spMa']:'';
	$_SESSION['cart'][$spMa]+= 1;

 echo "<script>location.href='cart.php';</script>";
}
if ($action=='giam')
{
	$spMa= isset($_GET['spMa'])?$_GET['spMa']:'';
	if($_SESSION['cart'][$spMa]>0)
	{
		$_SESSION['cart'][$spMa]-= 1;
	}
	if($_SESSION['cart'][$spMa]==0)
	{
		unset($_SESSION['cart'][$spMa]);	
	}

	
 echo "<script>location.href='cart.php';</script>";
}



if ($action=='xoa')
{
	$spMa= isset($_GET['spMa'])?$_GET['spMa']:'';
	unset($_SESSION['cart'][$spMa]);	
	header('location:cart.php');
}

if ($action=='huy')
{
	$tam=[];
	unset($_SESSION['cart']);
	header('location:cart.php');
}




?>