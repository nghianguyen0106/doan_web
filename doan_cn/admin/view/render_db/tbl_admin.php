<?php include('includes/connection.php');
////////////////////SHOW DATABASE & DELETE///////////
		$sql = "select * from tbl_admin";
		$query = mysqli_query($conn, $sql);

		if(isset($_GET['id_delete']))
		{
			if($_SESSION["admin"]["adQuyen"] == 1)
			{
				if(($_GET['id_delete']==$_SESSION["admin"]["adMa"]))
				{
					$mes ="<span style='color:red'>Không được xóa tài khoản đang đăng nhập!</span>";
				}
				else
				{
				$sql = "delete from tbl_admin where adMa ='$_GET[id_delete]'";
				$query = mysqli_query($conn, $sql);
				?>
				<script>
					window.location='index.php?quanly=tbl_admin';
				</script>
				<?php
				}}
			
			else{ 	
				?>
				<script>
					alert("Bạn không phải là nhân viên quản lý nên không thể thay đổi dữ liệu nhân viên!");
				
				</script>
				<?php 
				}}
		?>
		<!-------------------------------------->

<!--------------lOCK ACCOUNT------------->
<?php
if(isset($_GET['id_lock']))
	 		{
	 			if($_SESSION["admin"]["adQuyen"] == 1)
				{
		 			if($_GET["id_lock"]==$_SESSION["admin"]["adMa"])
					{
						$mes ="<span style='color:red'>Không được khóa tài khoản đang đăng nhập!</span>";
					}
					else{
		 			$sql = "select * from tbl_admin where adMa =".$_GET["id_lock"];
					$query3 = mysqli_query($conn, $sql);
					$data3 = mysqli_fetch_array($query3);
					
		 			if($data3["adTinhtrang"]==0)
		 			{
		 			$sql = "UPDATE tbl_admin SET adTinhtrang = '1' where adMa =".$_GET["id_lock"];
		 			$query = mysqli_query($conn, $sql);
		 			?>
					<script>
						window.location='index.php?quanly=tbl_admin';
					</script>
					<?php
		 			} 
		 			else if($data3["adTinhtrang"]==1)
		 			{
		 				$sql = "UPDATE tbl_admin SET adTinhtrang = '0' where adMa =".$_GET["id_lock"];
		 			$query = mysqli_query($conn, $sql);
		 			?>
					<script>
						window.location='index.php?quanly=tbl_admin';
					</script>
					<?php
		 			}
		 		}}
		 		else{
		 			?>
				<script>
					alert("Bạn không phải là nhân viên quản lý nên không thể thay đổi dữ liệu nhân viên!");
				
				</script>
				<?php 
		 		}
	 		}
	 	
 ?>
<!-------------------------------------->
<!------------------SEARCH------------>
		<?php 
			if(isset($_POST["btn_search"]))
			{
				$name_search = $_POST["name_search"];
				$name_search = strip_tags($name_search);
				$name_search = addslashes($name_search);
				if($name_search=="")
				{
					$mes="<tr><td colspan='7'><h4 style='color:red'>Thiếu thông tin tìm kiếm!</h4></td></tr>";
				}
				else
				{
					$sql = "SELECT * from tbl_admin where adTen like '%$name_search%'";
					$query = mysqli_query($conn, $sql);
					if(mysqli_num_rows($query)==0)
					{
						$mes="<tr><td colspan='7'><h4 style='color:red'>Không có kết quả tìm kiếm!</h4></td></tr>";
					}
				}

			
			} 
		?>
	 

<!--------------------------------------------------------------------------->
<h2>Quản lý nhân viên</h2>
<hr/>
 <form class="form__search" action="" method="POST" enctype="multipart/form-data">
	 	<input class="input__search" type="text" name="name_search" style="width: 40%;font-size: 21px;padding-left: 1rem;border-radius:10px 0 0 10px;outline: none;border:1px solid black;padding-bottom: 0.05rem;"/>
	 	<button class="btn__search" type="submit" name="btn_search">
	 		<i class="fas fa-search" style="font-size: 20px;"></i>
	 	</button>
	 	<span id="alert__search"></span>
	 </form>


<!------------------------>
<br/>
<a href="index.php?hanhdong=add_admin" class="add"><i class="fas fa-plus" style="font-size: 20px;color:white"></i>&nbsp;ADD</a>
<br/><br/>
<div class="box__tbl">

	 <!------------>

	<table class="tbl__db" border="1">
		<thead>
			<tr>
				<td>ID</td>
				<td>Account</td>
				<td>Email</td>
				<td>Password</td>
				<td>Permission</td>
				<td>Status</td>
				<td>Action</td>
			</tr>
			<?php
				echo isset($mes)?$mes:'';
				while($data = mysqli_fetch_array($query))
				{
					if($data["adTinhtrang"]==0)
					{
						$tinhtrang = "Bình thường";
						$key = ' <a href="index.php?quanly=tbl_admin&id_lock='.$data["adMa"].'"><i class="icon__unlock fas fa-unlock" style="font-size: 20px;color:green"></i></a>';
					}
					else if($data["adTinhtrang"]==1)
					{
						$tinhtrang = "Khóa";
						$key = ' <a href="index.php?quanly=tbl_admin&id_lock='.$data["adMa"].'"><i class="icon__lock fas fa-lock" style="font-size: 20px;color:red"></i></a>';
					}
					echo '<tr>
						<td>'.$data["adMa"].'</td>
						<td>'.$data["adTen"].'</td>
						<td>'.$data["adEmail"].'</td>
						<td>'.$data["adMatkhau"].'</td>
						<td>'.$data["adQuyen"].'</td>
						<td>'.$tinhtrang.'</td>
						<td><a href="index.php?hanhdong=edit_admin&id='.$data["adMa"].'"><i class="far fa-edit" style="font-size: 20px;color:blue"></i></a> || <a href="index.php?quanly=tbl_admin&id_delete='.$data["adMa"].'"><i class="far fa-trash-alt" style="font-size: 20px;color:grey"></i></a>
							<br/>
							'.$key.'
						 </td>

					</tr>';
				} 
			?>
		</thead>
	</table>
</div>