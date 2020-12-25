<?php include("includes/connection.php");
if (!isset($_GET["id"]))
                        {
                        //If not isset -> set with dumy value
                            $_GET["id"] = "undefine";
                        } 
		$sql = "select * from tbl_admin where adMa = '$_GET[id]'";
					$query = mysqli_query($conn,$sql);
					$data = mysqli_fetch_array($query);
      if(isset($_POST["btn_edit"]))
      {
      	$ID       = $_POST["ID"];
      	$username = $_POST["username"];
      	$email = $_POST["email"];
      	$password = $_POST["password"];
      	$permission = $_POST["permission"];
      	$tinhtrang=$_POST["tinhtrang"];
      	if($username=="" || $email=="" || $password=="" )
      	{
      		?>
                     <script>
                        alert("Vui lòng điền đầy đủ thông tin");
                      window.history.back();
                     </script>
                     <?php
      	}
      	else{
         $sql = "update tbl_admin set adTen= '$username' ,adEmail= '$email' , adMatkhau='$password', adQuyen='$permission',adTinhtrang='$tinhtrang' where adMa='$ID' ";
         $query = mysqli_query($conn, $sql);
      	 if($query)
         {
            ?>
			<script>
				window.location='index.php?quanly=tbl_admin';
			</script>
			<?php
         }
         else{ echo 'Update failed'; }
      	}
      }
 ?>
<div class="box__form">
	<form class="add__form" method="POSt" action="index.php?hanhdong=edit_admin">
		<h3>EDIT admin account</h3>
		 <span>Mã ID</span><br/>
		 <input class="input_readonly" readonly type="text" name="ID" value="<?php echo $data["adMa"] ?>" />
		<br/> <br/>
		 <span>Tên tài khoản</span><br/>
		 <input readonly type="text" name="username"value="<?php echo $data["adTen"] ?>"/>
		<br/> <br/>
		 <span>Email</span><br/>
		 <input type="email" name="email"value="<?php echo $data["adEmail"] ?>"/>
		<br/> <br/>
		 <span>Mật khẩu</span><br/>
		 <input type="text" name="password" value="<?php echo $data["adMatkhau"] ?>"/>
		<br/> <br/>
		 <span>Quyền</span><br/>
		 <input readonly type="number" name="permission" value="<?php echo $data["adQuyen"] ?>"/>
		<br/><br/>
			 <span>Tình trạng</span><br/>
		 <input type="number" name="tinhtrang" value="<?php echo $data["adTinhtrang"] ?>"/>
		<br/><br/>
		<div class="form__space">
		 <button class="btn__edit" type="submit" name="btn_edit">Cập nhật</button>
	    </div>
	</form>
</div>