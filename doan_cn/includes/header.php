<?php  	session_start();  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>

	<link rel = "icon" href =  "https://media.geeksforgeeks.org/wp-content/cdn-uploads/gfg_200X200.png" type = "image/x-icon"> 
	
	<link rel="stylesheet" href="./public/css/header.css">
	<link rel="stylesheet" href="./public/css/index.css">
	<link rel="stylesheet" href="./public/css/login_register.css">
	<link rel="stylesheet" href="./public/css/footer.css">
	<link rel="stylesheet" href="./public/css/main.css">
	<link rel="stylesheet" href="./public/css/cart.css">
	<link rel="stylesheet" href="./public/css/info.css">
	<link rel="stylesheet" href="./public/css/order.css">

	
	<link rel="stylesheet" type="text/css" href="./public/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./public/lib/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="./public/lib/fonts/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
	 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
</head>
<body>
     <a href="https://github.com/ltnhan2208/doanchuyennganh_website">Link source: https://github.com/ltnhan2208/doanchuyennganh_website</a>
	<section class="contact">
		<div class="container-fluid">
		    
			 <i class="fas fa-chevron-up" id="scroll" style="font-size: 30px;"></i>
			
			<div class="row">
				<div class="container">
					<br/>
					<div class="row ">
					<div class="col-6">
						<div class="social__network">
							<div class="top__bar--logo">
								<img src="images/logo.png" alt="">
							</div>
							<ul>
									<li><a href="https://www.facebook.com/"><i class="fab fa-facebook-square" style="font-size: 28px;"></i></a></li>
									<li><a href="instagram.com"><i class="fab fa-instagram" style="font-size: 28px;"></i></a></li>
									<li><a href="twitter.com"><i class="fab fa-twitter-square" style="font-size: 28px;"></i></a></li>
							</ul>
						</div>
					</div>
						<!-------end Social Network------->
						
						<div class="col-6">
							<div class="link__contact">
								<ul>
									<li><a href="tel:0704507066"><i class="fas fa-phone-alt" style="font-size: 18px;"></i> &nbsp; <label>0704507066</label> &nbsp;&nbsp;</a></li>
									<li><a href = "mailto: abc123@gmail.com">| &nbsp;&nbsp;<i class="fas fa-envelope" style="font-size: 18px;"></i>&nbsp;&nbsp;<label>Email: abc123@gmail.com</label></a></li>
								</ul>
							</div>
						</div>
					
						<!-------end link contact------->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!------End Contact------>
	<section class="top__bar">
		<div class="container-fluid">
			<br/><br/>
			<div class="row">
				<div class="container-fluid">
					<div class="row justify-content-around">
						<div class="col-4">
							
						</div>
						<!-------end top__bar--logo------->
						<div class="col-8">
								<label for="show" class="show__menu" >
									<i class="fas fa-bars" style="font-size: 30px;"></i>
								</label>
									<input id="show" hidden  type="checkbox"/>
								<label for="show" class="bg_overplay"></label>
								<div id="top__bar--menu__res" class="top__bar--menu__res">
											<label for="show" class="exit__menu"><i class="fas fa-sign-out-alt" style="font-size: 28px;background-color: #9597B2;border: 0;background-color: transparent;"></i> </label>
											<br/>
											
											<ul>
											<?php  
										if(!isset($_SESSION["khMa"]))
										{
											echo '<li><a href="./login.php"><i class="fas fa-user-circle" style="font-size: 28px;"></i><br/>
													 Account</a></li>';
											
										}
										else
										{
										echo '<li><a href="./infomation.php?show=show_info"><img style="width:35px;height: 35px;border-radius:50%;" src="images/img_customer/'. $_SESSION["khHinh"].'"/><br/>
													 '.$_SESSION["khTen"].'</a></li>'; 
											echo '<li><a href="./logout.php"><i class="fas fa-sign-out-alt" style="font-size: 28px;background-color: #9597B2;border: 0;background-color: transparent;"></i><br/>
											Logout</a></li>';
										}
										?>

											<div style="width: 100%;background-color: white;height: 2px;"></div>
											<br/>
											<li><a href="./index.php"><i class="fab fa-themeisle" style="font-size: 28px;"></i>&nbsp;Home</a></li>
											<li><i class="fas fa-laptop" style="font-size: 28px;"></i>&nbsp;Product
												<ul class="child__menu">
													<li><a href="product.php?show=show_laptop" >Laptop</a></li>
													<li><a href="product.php?show=show_PC">PC</a></li>
												</ul>
											</li>
											
											<li><a href="./about-us.php"><i class="fas fa-users" style="font-size: 28px;"></i>&nbsp;About us</a></li>
											<li><a ><i class="fas fa-hands-helping" style="font-size: 28px;"></i>&nbsp;Help</a></li>
											<li><a ><i class="fab fa-servicestack" style="font-size: 28px;"></i>&nbsp;Service</a></li>
											<li ><a href="./cart.php"><i class="fas fa-shopping-cart" style="font-size: 28px;"></i>&nbsp;Cart 
												<?php 
												$temp=0;
												if(isset($_SESSION['cart']))
												{
													foreach ($_SESSION['cart'] as $k => $v) 
													{
														$temp+=$v;
													}
													echo '[ '.$temp.' ]';
												}
													
												
												 ?>
											</a></li>
											
										</ul>
									</div>
								<!-------end top__bar--menu__res--->	
								<ul class="top__bar--menu">
									<li><a href="./index.php">
										<i class="fab fa-themeisle" style="font-size: 28px;"></i><br/>
									Home</a></li>
									<li><i class="fas fa-laptop" style="font-size: 28px;"></i><br/>Product&nbsp;<i class="fas fa-chevron-down" style="font-size: 15px;padding-top: 5px"></i>
										<ul class="child__menu">
											<li><a href="product.php?show=show_laptop" >Laptop</a></li>
													<li><a href="product.php?show=show_PC">PC</a></li>
										</ul>
									</li>
									<li><a href="./about-us.php"><i class="fas fa-users" style="font-size: 28px;"></i><br/>About us</a></li>
									<li><a><i class="fas fa-hands-helping" style="font-size: 28px;"></i><br/>Recruitment</a></li>
									<li><a><i class="fab fa-servicestack" style="font-size: 28px;"></i><br/>Service</a></li>
									
										<?php  
										if(!isset($_SESSION["khMa"]))
										{
											echo '<li><a href="./login.php"><i class="fas fa-user-circle" style="font-size: 28px;"></i><br/>
													 Account</a></li>';
											
										}
										else
										{
										echo '<li><img style="width:35px;height: 35px;border-radius:50%;" src="images/img_customer/'. $_SESSION["khHinh"].'" alt="Chưa thêm ảnh"/><br/>
													 '.$_SESSION["khTen"].'
												<ul class="child__menu child__menu--info">
													<li><a href="./infomation.php?show=show_info" ><img style="width:25px;height: 25px;border-radius:50%;" src="images/img_customer/'. $_SESSION["khHinh"].'"/>Infomation</a></li>
													<li><a href="./order.php"><i class="fas fa-shopping-cart" style="font-size: 18px;background-color: #9597B2;border: 0;background-color: transparent;"></i>Your order</a></li>
													<li><a href="./logout.php"><i class="fas fa-sign-out-alt" style="font-size: 18px;background-color: #9597B2;border: 0;background-color: transparent;"></i>Logout</a></li>
												</ul>

											</li>'; 
											
										}
										?>
									
									<li><a href="./cart.php"><i class="fas fa-shopping-cart" style="font-size: 28px;"></i><br/>Cart
									<?php 
												$temp=0;
												if(isset($_SESSION['cart']))
												{
													foreach ($_SESSION['cart'] as $k => $v) 
													{
														$temp+=$v;
													}
													echo '[ '.$temp.' ]';
												}
													
												
												 ?></a></li>
								</ul>
								<!-------end top__bar--menu--->

								
								<br/>
						</div>
						<!-------end top menu------->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!---------End top__bar--------->
