<?php session_start();
		include ("includes/permission.php");
		if($_SESSION["admin"]["adTinhtrang"]>0)
		{
		    header("location:login.php");
		}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trang quản trị</title>

	<link rel = "icon" href =  "https://media.geeksforgeeks.org/wp-content/cdn-uploads/gfg_200X200.png" type = "image/x-icon"> 
	
	<link rel="stylesheet" href="./public/css/header.css">
	<link rel="stylesheet" href="./public/css/index.css">
	<link rel="stylesheet" href="./public/css/content.css">
	<link rel="stylesheet" href="./public/css/act.css">
	<link rel="stylesheet" href="./public/css/main.css">

	
	<link rel="stylesheet" type="text/css" href="./public/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./public/lib/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="./public/lib/fonts/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
	 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>

    <!-------checkdirto---->
	<script src="ckeditor/ckeditor.js"></script>

</head>
<body>
	<section class="view__admin">
		<div class="container-fluid">
			 <i class="fas fa-chevron-up" id="scroll" style="font-size: 30px;"></i>
			<div class="row">
						<div class="col-lg-2 col-sm-1" style="margin:0; padding:0; ">
							<?php include("./includes/header.php") ?>
						</div>
						<div class="col-lg-10 col-sm-10">
							<?php include("./view/render_db/content.php") ?>
							<?php include("./view/action/act.php") ?>
						</div>
			</div>
		</div>
	</section>
	<!---------End top__bar--------->


<script src="public/js/scroll.js"></script>

</body>
</html>
