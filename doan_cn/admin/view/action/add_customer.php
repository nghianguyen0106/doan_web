<?php error_reporting(0);
 require_once("includes/connection.php");
      if(isset($_POST["btn_add"]))
      {
      	$name = $_POST["name"];
      	$date = $_POST["date"];
      	$address     = $_POST["address"];
      	$email     = $_POST["email"];
      	$gender    = $_POST["gender"];
      	$password = $_POST["password"];
      	$password = md5($password);
     	$sdt    = $_POST["sdt"];
      	$permission  = $_POST["permission"];
      	$tinhtrang  = $_POST["tinhtrang"];
      	$img = $_FILES['hinh']['name'];
      	$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png",""=>"image/''");
    	$test = pathinfo($img, PATHINFO_EXTENSION);
      
      	if($name=="" || $password=="" || $date=="" || $email=="" || $address==""||$gender==""||$sdt=="")
      	{
      		?>
			   <script>
	 			alert("Vui lòng điền đầy đủ thông tin");
			    window.history.back();
			   </script>
			   <?php
      	}
      	else
      	{
      		if(!array_key_exists($test, $allowed)) 
		    	{
		    		?>
			    		<script>
			    			alert("Vui lòng chọn đúng file ảnh");
			    			window.history.back();
			    		</script>
			    		<?php
		    	}
		    else
		    {
	      		$sql = "INSERT INTO tbl_khachhang(khMa,khTen,khDiachi,khNgaysinh,khEmail,khGioitinh,khSdt,khHinh,khMatkhau,khQuyen,khTinhtrang) values (null, '$name', '$address','$date', '$email','$gender','$sdt','$img','$password','$permission','$tinhtrang')";
	      		$query = mysqli_query($conn, $sql);
	      		if($img != "")
	      		{
	      			move_uploaded_file($_FILES['hinh']['tmp_name'], "../images/img_customer/$img");
	      			
	      		}
	      		echo '<p>Thêm thành công!, <a href="index.php?quanly=tbl_customer">quay lại trang trước</a></p>';
      		}
      	}
      		
      }
 ?>
<div class="box__form">
	<form class="add__form" method="POSt" action="index.php?hanhdong=add_customer" enctype="multipart/form-data">
		<h3>Add customer account</h3>
		 <span>Tên tài khoản</span><br/>
		 <input type="text" name="name" placeholder="..."/>
		<br/> <br/>
		 <span>Ngày sinh</span><br/>
		 <input type="date" name="date" placeholder="..."/>
		 <br/> <br/>
		 <span>Giới tính</span><br/>
		 
		 <input type="radio" name="gender" value="0" style="width: 30px" />Nam 
		 <input type="radio" name="gender" value="1" style="width: 30px"/>Nữ 
		
		 <br/> <br/>
		 <span>Địa chỉ</span><br/>
		 <input type="text" name="address" placeholder="..."/>
		 <br/> <br/>
		  <span>Địa chỉ email</span><br/>
		 <input type="email" name="email" placeholder="..."/>
		 <br/> <br/>
		 <span>Số điện thoại</span><br/>
		 <input type="number" name="sdt" placeholder="..."/>
		 <br/> <br/>
		 <span>Ảnh</span><br/>
		  <input type="file" name="hinh"/>
		<br/><br/>
		 <span>Mật khẩu</span><br/>
		 <input type="text" name="password" placeholder="..."/>
		<br/><br/>
		 <span>Quyền</span><br/>
		 <input type="number" name="permission" placeholder="..."/>
		<br/><br/>
		 <span>Tình trạng</span><br/>
		 <input type="number" name="tinhtrang" placeholder="..."/>
		<br/><br/>
		<div class="form__space">
		 <button class="btn__add" type="submit" name="btn_add">Thêm</button>
	    </div>
	</form>
</div>