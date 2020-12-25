<?php include("includes/connection.php");
error_reporting(0);
	if (!isset($_GET["id"]))
                        {
                        //If not isset -> set with dumy value
                            $_GET["id"] = "undefine";
                        } 
		$sql = "select * from tbl_khachhang where khMa ='$_GET[id]'";
			$query = mysqli_query($conn,$sql);
			$data = mysqli_fetch_array($query);

	$male_checked = "unchecked";
	$female_checked = "unchecked";
	if($data["khGioitinh"]==0)
	{
		$male_checked = "checked";
	}
	else
	{
		$female_checked = "checked";
	}

      if(isset($_POST["btn_edit"]))
      {
      	$ID = $_POST["ID"];
      	$name = $_POST["name"];
      	$date = $_POST["date"];
      	$gender    = $_POST["gender"];
      	$address     = $_POST["address"];
      	$email     = $_POST["email"];
      	$sdt    = $_POST["sdt"];
      	$permission  = $_POST["permission"];
      	$status=$_POST['status'];
      	$img = $_FILES['hinh']['name'];
      	$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png",""=>"image/''");
    	$test = pathinfo($img, PATHINFO_EXTENSION);
    	if($name==""|| $date=="" || $email=="" || $address==""||$gender==""||$sdt=="")
      	{
      		?>
			   <script>
	 			alert("Vui lòng điền đầy đủ thông tin");
			    window.history.back();
			   </script>
			   <?php
      	}
      	else{
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
	    	if($img != null)
		   	{
		      		$tmp_img = $_FILES["hinh"]["tmp_name"];
		      		$img = $_FILES['hinh']['name'];
		      		move_uploaded_file($tmp_img, "../images/img_customer/$img");
		      		$sql = "UPDATE tbl_khachhang SET khHinh = '$img' where khMa='$ID' ";
		      		$query = mysqli_query($conn, $sql);
		      		echo "Update thành công";
		      	}

		      	  $sql = "UPDATE tbl_khachhang set khTen= '$name',khDiachi='$address' ,khNgaysinh='$date',khEmail= '$email',khGioitinh='$gender',khSdt='$sdt', khQuyen='$permission',khTinhtrang='$status' where khMa='$ID' "; 
		           $query = mysqli_query($conn, $sql);
		           if($query)
		         {
		             ?>
					<script>
						window.location='index.php?quanly=tbl_customer';
					</script>
					<?php
		         }
		         else{ echo 'Update failed'; }
	    	}
  		}

      }
 ?>
<div class="box__form">
	<form class="add__form" method="POST" action="index.php?hanhdong=edit_customer" enctype="multipart/form-data">
		<h3>Edit customer account</h3>
		<span>Mã tài khoản</span><br/>
		 <input class="input_readonly" type="text" name="ID" readonly value="<?php echo $data['khMa'] ?>"/>
		<br/> <br/>
		 <span>Tên tài khoản</span><br/>
		 <input type="text" name="name"value="<?php echo $data['khTen'] ?>"/>
		<br/> <br/>
		 <span>Ngày sinh</span><br/>
		 <input type="date" name="date" value="<?php echo $data['khNgaysinh'] ?>"/>
		  <span>Giới tính</span><br/>
		 
		 <input type="radio" name="gender" value="0" <?php echo $male_checked ?> style="width: 30px" />Nam 
		 <input type="radio" name="gender" value="1"
		   <?php echo $female_checked ?> style="width: 30px"/>Nữ 
		 <br/> <br/>
		 <span>Địa chỉ</span><br/>
		 <input type="text" name="address" value="<?php echo $data['khDiachi'] ?>"/>
		 <br/> <br/>
		  <span>Địa chỉ email</span><br/>
		 <input type="email" name="email" value="<?php echo $data['khEmail'] ?>"/>
		 <br/> <br/>
		  <span>Số điện thoại</span><br/>
		 <input type="number" name="sdt" value="<?php echo $data["khSdt"] ?>"/>
		 <br/> <br/>
		 <span>Ảnh</span><br/>
		  <input type="file" name="hinh" value="<?php echo $data['khHinh'] ?>"/>
		<br/><br/>
		
		 <span>Quyền</span><br/>
		 <input type="number" name="permission" value="<?php echo $data['khQuyen'] ?>"/>
		<br/><br/>
		 <span>Tình trạng</span><br/>
		 <input type="number" name="status" value="<?php echo $data['khTinhtrang'] ?>"/>
		<br/><br/>
		<div class="form__space">
		 <button class="btn__edit" type="submit" name="btn_edit">Sửa</button>
	    </div>
	</form>
</div>