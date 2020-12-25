<?php session_start();
	include ("includes/connection.php");	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Admin</title>
	<link rel="stylesheet" href="./public/css/login.css">
	
	<link rel="stylesheet" type="text/css" href="./public/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./public/lib/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="./public/lib/fonts/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
	 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
</head>
<body>



<!------------------------>
<div class="bg__login">
	

	<section class="box__login" style="height: 100%">
		<div class="container">
			<div class="row justify-content-around" >
				<div class="col-lg-4 col-sm-12 col-xs-12"  >
					<form class="form__login" method="POST" acion="login.php">
						<p style="color: red;font-weight: bold;"><?php echo isset($_SESSION['mes'])?$_SESSION['mes']:'' ; unset($_SESSION['mes'])?></p>
						<legend style="font-style: italic;color: white">LOGIN</legend>
						<i id="fa-user" class="fas fa-user"></i>
						<input id="in-user" type="text" name="account"  />
						<br/>
						<span id="error__user"></span>
						<br/>
						<i id="fa-key" class="fas fa-key"></i>
						<input id="in-key" type="password" name="password"  />
						<br/>
						<span id="error__pass" ></span>
						<br/>
						<button id="btn_login" type="submit" name="btn_login">login</button>
						<br/><br/>
					

					</form>
				</div>
				
			</div>
		</div>
	</section>
</div>
<!-----------PHP------------->
<?php
	if(isset($_POST["btn_login"]))
	{
		$account = $_POST["account"];
		$password =$_POST["password"];
		$account = strip_tags($account);
		$account = addslashes($account);
		$password = strip_tags($password);
		$password = addslashes($password);
		$password=md5($password);
		if($account =="")
		{
			echo '
				<script>
				var x = document.getElementById("error__user");
				 x.innerHTML = "Tài khoản không được để trống!" ;
				</script>';
		}
		else if($password=="")
		{
			echo '
				<script>
				var x = document.getElementById("error__pass");
				 x.innerHTML = "Mật khẩu không được để trống!" ;
				</script>';
		}
		else
		{
			$sql = "SELECT * from tbl_admin where adTen = '$account' and adMatkhau = '$password'";
			$query= mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if($num_rows == 0)
			{
				echo '<script>
				var x = document.getElementById("error__pass");
				 x.innerHTML = "Tài khoản hoặc mật khẩu không chính xác!" ;
				</script>';
			}
			else
			{
				if($data["adTinhtrang"]>0)
				{
					echo '<script>
				var x = document.getElementById("error__pass");
				 x.innerHTML = "Tài khoản đã bị khóa!" ;
				</script>';
				}
				else
				{
				$_SESSION["admin"] = mysqli_fetch_array($query);

			?>
					<script>
						window.location='index.php';
					</script>
			<?php
			}
		}
		}
		
	}
?>
<!---------------------------->
<script src="public/js/js.js"></script>

 </body>
</html>

