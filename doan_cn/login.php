<?php ob_start();


 require("includes/connection.php");
	include ("includes/header.php");
	?>

<section class="box__login" style=" background-image: url('images/a.jpg');" >
	<div class="container-fluid">
		<div class="row ">
			<div class="col-lg-6"></div>
			<!------End left space -------->
			<div class="col-lg-6 col-sm-12 col-xs-12 ">
				<form class="form__login" action="login.php" method="POST">
					<h2><i>LOGIN</i></h2>
					<?php 
						if(isset($_GET['mes']))
						{
							echo '<p style="text-align:center;color:red;font-weight:bold;">'.$_GET['mes'].'</p>';
						}
					 ?>
							<label >Username</label>
							<span >:&nbsp;<input type="email" name="email" placeholder="ex:abc@gmai.com....." /></span>
							<span id="error__email"  class="error"></span>
							<br/>
							<label >Password</label>
							<span >:&nbsp;<input type="password" name="password"/></span>
							<span id="error__pass" class="error"></span>
							<br/><br/>
							<div class="box_btn">
								<button class="btn_login sweep__to__right" type="submit" name="btn_login" >Login</button>
							</div>
							<br/>
							<p style="text-align: center;color:black">If don't have account, let's <a href="./register.php" style="text-align: none;font-weight: bold"><font color="black">REGISTER</font></a></p>
							<br/>
				</form>
			</div>
			<!------End box login -------->
		</div>
		
	</div>
</section>
<!--------------PHP---------------->
<?php
	
	
	if(isset($_POST["btn_login"]))
	{
		$email = $_POST["email"];
		$password = $_POST["password"];
		$email = strip_tags($email);
		$email = addslashes($email);
		$password = strip_tags($password);
		$password = addslashes($password);
		$password=md5($password);
		if( $email == "") 
		{
			echo '
				<script>
				var x = document.getElementById("error__email");
				 x.innerHTML = "Tài khoản email không được để trống!" ;
				</script>';
		}
		else if($password == "" )
		{
			echo '
				<script>
				var x = document.getElementById("error__pass");
				 x.innerHTML = "Mật khẩu không được để trống!" ;
				</script>';
		}
		else
		{
			$sql = "SELECT * FROM tbl_khachhang where khEmail='$email' and khMatkhau='$password' ";
			$query = mysqli_query($conn, $sql);
			$data=mysqli_fetch_array($query);
			
			$row = mysqli_num_rows($query);
			if($row == 0)
			{
				echo '
				<script>
				var x = document.getElementById("error__pass");
				 x.innerHTML = "Thông tin tài khoản hoặc mật khẩu không chính xác!";
				</script>';
			}
			else if($data['khTinhtrang']>0)
			{?>
				<script>
					var x = document.getElementById("error__pass");
					 x.innerHTML = "Tài khoản đã bị khóa do vi phạm chính sách của trang !" ;
				</script>
			<?php }
			else
			{
				
					
						$_SESSION["khMa"] = $data["khMa"];
						$_SESSION["khTen"] = $data["khTen"];
						$_SESSION["khSdt"] = $data["khSdt"];
						if($data["khGioitinh"]==0)
						{
							$_SESSION["khGioitinh"] = "Nam";	
						}
						else
						{
							$_SESSION["khGioitinh"] = "Nữ";
						}	
						$_SESSION["khNgaysinh"] = $data["khNgaysinh"];
						$_SESSION["khDiachi"] = $data["khDiachi"];
						$_SESSION["khEmail"] = $data["khEmail"];
						$_SESSION["khHinh"] = $data["khHinh"];
						$_SESSION["khQuyen"] = $data["khQuyen"];
				
		
			?>
			<script>
				window.location='index.php';
			</script>
			<?php
			}
		}
	}
	
	 
?>
<!-------------END PHP------------->


<?php include ("includes/footer.php");
	
