<?php require("includes/connection.php");
	include ("includes/header.php"); ?>
<section class="box__login" style=" background-image: url('images/a.jpg');" >
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6"></div>
			<!------End left space -------->
			<div class="col-lg-6 col-sm-12">
				<div class="box__login--over_background "></div>
				<form class="form__login " action="register.php" method="POST" enctype="multipart/form-data">
					<h2><i>REGISTER</i></h2>
							<label >Username</label>
							<span >:&nbsp;<input type="text" name="username"  /></span>
							<span id="error__user" class="error"></span>
							<br/>
							<label >Password</label>
							<span >:&nbsp;<input type="password" name="password"/></span>
							<span id="error__pass" class="error"></span>
							<br/>
							<label >Repassword</label>
							<span >:&nbsp;<input type="password" name="re_pass"/></span>
							<span id="error__repass" class="error"></span>
							<br/>
							<label >Email</label>
							<span>:&nbsp;<input  type="email" name="email"  /></span>
							<span id="error__email" class="error"></span>
												 <br/> 
							 <label >Gender</label>
							 <span>:&nbsp;
							 <input type="radio" class="gender" name="gender" value="0" style="width: 30px" />Nam 
							 <input type="radio" class="gender" name="gender" value="1" style="width: 30px"/>Nữ
							 <span id="error__gender" class="error"></span>
							</span>
							 <br/>
							<label >Address</label>
							<span>:&nbsp;<input  type="text" name="address" /></span>
							<span id="error__address" class="error"></span>
							 <br/>
							<label >Number phone</label>
							<span>:&nbsp;<input  type="number" name="sdt" /></span>
							<span id="error__sdt" class="error"></span>
							<br/>
							<label >Date</label>
							<span>:&nbsp;<input  type="date" name="date" style="width: 70%; outline: none; border:0; border-bottom:1px solid lightgrey; padding-left: 0.5rem; background-color: transparent;" /></span>
							<span id="error__date" class="error"></span>
							<br/>
							</span>			
							<button class="btn_register sweep__to__right" type="submit" name="btn_register" >Register</button>
							<br/>
							<span id="complete__register" class="error"></span>
							<p style="text-align: center;color:black">Back to <a href="./login.php" style="text-align: none;font-weight: bold"><font color="black">LOGIN</font></a></p>
							<br/>
							<br/>
				</form>
			</div>
			<!------End box login -------->
		</div>
		
	</div>
</section>
<!------------PHP-------------->
<?php error_reporting(0);
	
	if(isset($_POST["btn_register"]))
	{
		$name = $_POST["username"];
		$password = $_POST["password"];
		$repass = $_POST["re_pass"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$gender = $_POST["gender"];
		$sdt = $_POST["sdt"];
		$len = 10;
		$hinh = substr(md5(rand()), 0,$len); 
		$date = $_POST["date"];
		$permission = 0;
		$tinhtrang=0;

		if($name=="") 
		{
			echo '<script>
				var x = document.getElementById("error__user");
				 x.innerHTML = "Tên người dùng không được để trống!" ;
				</script>';
		}
		else if($password=="")
		{
			echo '<script>
				var x = document.getElementById("error__pass");
				 x.innerHTML = "Mật khẩu không được để trống!" ;
				</script>';
		}
		else if($repass=="")
		{
			echo '<script>
				var x = document.getElementById("error__repass");
				 x.innerHTML = "Mật khẩu nhập lại không được để trống!" ;
				</script>';
		}
		else if($password != $repass)
		{
			echo '<script>
				var x = document.getElementById("error__repass");
				 x.innerHTML = "Mật khẩu nhập lại không phải trùng với mật khẩu đã nhập!!!" ;
				</script>';
		}
		else if($email=="")
		{
			echo '<script>
				var x = document.getElementById("error__email");
				 x.innerHTML = "Email đăng nhập không được để trống!" ;
				</script>';
		}
		else if($address=="")
		{
			echo '<script>
				var x = document.getElementById("error__address");
				 x.innerHTML = "Địa chỉ không được để trống!" ;
				</script>';
		}
		else if($date=="")
		{
			echo '<script>
				var x = document.getElementById("error__date");
				 x.innerHTML = "Ngày sinh không được để trống!" ;
				</script>';
		}

		else if($sdt=="")
		{
			echo '<script>
				var x = document.getElementById("error__sdt");
				 x.innerHTML = "Số điện thoại không được để trống!" ;
				</script>';
		}		
		else if($gender=="")
		{
			echo '<script>
				var x = document.getElementById("error__gender");
				 x.innerHTML = "Giới tính không được để trống!" ;
				</script>';
		}		
		
		else
		{
			$password = md5($_POST["password"]);
      		$sql = "INSERT INTO tbl_khachhang(khMa,khTen,khDiachi,khNgaysinh,khEmail,khGioitinh,khSdt,khHinh,khMatkhau,khQuyen,khTinhtrang) values (null, '$name', '$address','$date', '$email','$gender','$sdt','$img','$password','$permission','$tinhtrang')";

			$query = mysqli_query($conn, $sql);
			echo '<script>
				var x = document.getElementById("complete__register");
				 x.innerHTML = "Đăng ký thành công!" ;
				</script>';
			
		}
	}
?>

<!------------END PHP----------------->

<br/><br/><br/><br/>
<?php include ("includes/footer.php");
	
