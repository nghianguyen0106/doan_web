<?php require_once("includes/connection.php");
      if(isset($_POST["btn_add"]))
      {
      	
      	$username = $_POST["username"];
      	$email = $_POST["email"];
      	$password = md5($_POST["password"]);
      	$tinhtrang=$_POST["tinhtrang"];
      	if($_POST["adQuyen"]==165)
      	{
      		$quyen=$_POST["adQuyen"];
      	}
      	if($username=="" || $email=="" || $password=="" )
      	{
      		?>
                     <script>
                        alert("Vui lòng điền đầy đủ thông tin");
                      window.history.back();
                     </script>
                     <?php
      	}
      	else if(isset($quyen))
      	{
      		$sql = "INSERT INTO tbl_admin(adMa, adTen,adEmail , adMatkhau, adQuyen,adTinhtrang) values (null, '$username','$email' , '$password', '$quyen','$tinhtrang')";
      		$query = mysqli_query($conn, $sql);
      		echo "Thêm thành công";
      	}
      	else
      	{
      		$sql = "INSERT INTO tbl_admin(adMa, adTen,adEmail , adMatkhau, adQuyen,adTinhtrang) values (null, '$username','$email' , '$password', 100,'$tinhtrang')";
      		$query = mysqli_query($conn, $sql);
      		echo '<p>Thêm thành công!, <a href="index.php?quanly=tbl_admin">quay lại trang trước</a></p>';
      	}
      }
 ?>
<div class="box__form">
	<form class="add__form" method="POSt" action="index.php?hanhdong=add_admin">
		<h3>ADD admin account</h3>
		 <span>Tên tài khoản</span><br/>
		 <input type="text" name="username" placeholder="..."/>
		<br/> <br/>
		 <span>Email</span><br/>
		 <input type="email" name="email"/>
		<br/> <br/>
		 <span>Mật khẩu</span><br/>
		 <input type="text" name="password" placeholder="..."/>
		<br/> <br/>
		 <span>Quyền</span><br/>
		 <input type="number" name="adQuyen" placeholder="..."/>
		<br/><br/>
		<span>Tình trạng</span><br/>
		 <input type="number" name="tinhtrang" placeholder="..."/>
		<br/><br/>
		<div class="form__space">
		 <button class="btn__add" type="submit" name="btn_add">Thêm</button>
	    </div>
	</form>
</div>