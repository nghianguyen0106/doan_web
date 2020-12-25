<?php 
	$male_status = "unchecked";
	$female_status="unchecked";
	if($_SESSION["khGioitinh"]==0)
	{
		$male_status = "checked";
	}
	else{$female_status="checked";}
?>
<div class="box__info">

					<form method="POST" enctype="multipart/form-data" action="infomation.php?show=edit_info">
						<h2>Chỉnh sửa thông tin cá nhân</h2>
						<br/><br/>
						<div>
							<div class="r">Name:</div>
							<input type="text" name="username" value="<?php echo $_SESSION["khTen"] ?>"/>
						</div>
						<br/>
						<div>
							<div class="r">Email:</div>
							<input type="email" readonly name="email" value="<?php echo $_SESSION["khEmail"] ?>"/>
							
						</div>
						<br/><br/>
						
						<div>
							<div class="r">Gender:</div>
							<input type="radio" name="gt" value="0"  <?php echo $male_status ?> style="width:30px;margin-top:0.3rem;"/>Nam
			              
			                <input type="radio" name="gt" value="1"  <?php echo $female_status ?> style="width:30px;margin-top:0.3rem;"/>Nữ

						</div>
						<br/><br/>
					
						<div>
							<div class="r">Date:</div>
							<input type="date" name="date" value="<?php echo $_SESSION["khNgaysinh"] ?>"/>
							
						</div>
						<br/><br/>
						<div>
							<div class="r">Address:</div>
							<input type="text" name="address" value="<?php echo $_SESSION["khDiachi"] ?>"/>
							
						</div>
						<br/><br/>
						<div>
							<div class="r">Number Phone:</div>
							<input type="text" name="khSdt" value="<?php echo $_SESSION["khSdt"] ?>"/>
						</div>
						<br/><br/>
						<div>
							<div class="r">Avatar:</div>
							<input type="file" name="khHinh" accept="image/x-png,image/gif,image/jpeg"/>
							
						</div>
						<br/>
						<button type="submit" name="btn_edit"  style="color:white; background-color: #113890;border:0;padding: 6px 30px;outline: none">Lưu</button>
					</form>
				</div>


<?php


function postIndex($i,$v='')
{
	return isset($i)?$i:$v;
}
 if(isset($_POST["btn_edit"]))
  {
  	$khMa=$_SESSION['khMa'];
  	$username=postIndex($_POST['username']);
  	$email=postIndex($_POST['email']);
  	$gt=postIndex($_POST['gt']);
  	$date=postIndex($_POST['date']);
  	$address=postIndex($_POST['address']);
  	$khSdt=postIndex($_POST['khSdt']);
  	$img = $_FILES['khHinh']['name'];
  	$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png",""=>"image/''");
    $test = pathinfo($img, PATHINFO_EXTENSION);
  		
    if($username==""|| $date=="" || $email=="" || $address==""||$khSdt=="")
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
		    	else{
		    			if($img != null)
			      	{
			      		$tmp_img = $_FILES["khHinh"]["tmp_name"];
			      		$img = $_FILES['khHinh']['name'];
			      		move_uploaded_file($tmp_img, "./images/img_customer/$img");
			      		$sql = "UPDATE tbl_khachhang SET khHinh = '$img' where khMa='$khMa' ";
			      		$query = mysqli_query($conn, $sql);
			      		echo "Update thành công";
			      	}
			      	if($img==null)
					{
						$img = $_SESSION["khHinh"];
					}

			      	  $sql = "UPDATE tbl_khachhang set khTen= '$username',khEmail='$email',khGioitinh='$gt' ,khNgaysinh='$date',khDiachi='$address',khSdt='$khSdt' where khMa='$khMa' "; 
			          
			         $query = mysqli_query($conn, $sql);
			         //Xóa dữ liệu cũ
			          	unset($_SESSION["khTen"]);
						unset($_SESSION["khSdt"]);
						unset($_SESSION["khGioitinh"]);
						unset($_SESSION["khNgaysinh"]);
						unset($_SESSION["khDiachi"]);
						unset($_SESSION["khHinh"]);
						
						
						//Truy cập dữ liệu mới
								$_SESSION["khMa"] = $khMa;
								$_SESSION["khTen"] = $username;
								$_SESSION["khSdt"] = $khSdt;
								$_SESSION["khGioitinh"] = $gt;	
								$_SESSION["khNgaysinh"] = $date;
								$_SESSION["khDiachi"] = $address;
								$_SESSION["khHinh"] = $img;
								
								?>
								<script>
									window.location='infomation.php?show=show_info';
								</script>
								<?php
								exit;
					    	}
			      
		}
	}?>
