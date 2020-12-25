<?php require_once('includes/connection.php');
		$sql = "select * from tbl_khachhang";
		$query = mysqli_query($conn, $sql);

		if(isset($_GET['id_delete']))
		{
			$sql = "delete from tbl_khachhang where khMa =".$_GET["id_delete"];
			$query = mysqli_query($conn, $sql);
			?>
		<script>
			window.location='index.php?quanly=tbl_customer';
		</script>
		<?php
		}
	 ?>
	 	<?php
	 		if(isset($_GET['id_lock']))
	 		{
	 			$sql = "select * from tbl_khachhang where khMa =".$_GET["id_lock"];
				$query3 = mysqli_query($conn, $sql);
				$data3 = mysqli_fetch_array($query3);
	 			if($data3["khTinhtrang"]==0)
	 			{
	 			$sql = "UPDATE tbl_khachhang SET khTinhtrang = '1' where khMa =".$_GET["id_lock"];
	 			$query = mysqli_query($conn, $sql);
	 			?>
				<script>
					window.location='index.php?quanly=tbl_customer';
				</script>
				<?php
	 			} 
	 			else if($data3["khTinhtrang"]==1)
	 			{
	 				$sql = "UPDATE tbl_khachhang SET khTinhtrang = '0' where khMa =".$_GET["id_lock"];
	 			$query = mysqli_query($conn, $sql);
	 			?>
				<script>
					window.location='index.php?quanly=tbl_customer';
				</script>
				<?php
	 			}
	 		}
	 	?>
	 <?php //////////////////////////////////
			if(isset($_POST["btn_search"]))
			{
				$name_search = $_POST["name_search"];
				$name_search = strip_tags($name_search);
				$name_search = addslashes($name_search);
				if($name_search=="")
				{
					$mes="<tr><td colspan='12'><h4 style='color:red'>Thiếu thông tin tìm kiếm!</h4></td></tr>";
				}
				else
				{
					$sql = "SELECT * from tbl_khachhang where khTen like '%$name_search%'";
					$query = mysqli_query($conn, $sql);
					if(mysqli_num_rows($query)==0)
					{
						$mes="<tr><td colspan='12'><h4 style='color:red'>Không có kết quả tìm kiếm!</h4></td></tr>";
					}
				}
			} 
		?>
		<!------------------------------------------------------>
<h2>Quản lý khách hàng</h2>
<hr/>
<form class="form__search" action="" method="POST" enctype="multipart/form-data">
	 	<input class="input__search" type="text" name="name_search" style="width: 40%;font-size: 21px;padding-left: 1rem;border-radius:10px 0 0 10px;outline: none;border:1px solid black;padding-bottom: 0.05rem;"/>
	 	<button class="btn__search" type="submit" name="btn_search">
	 		<i class="fas fa-search" style="font-size: 20px;"></i>
	 	</button>
	 	<span id="alert__search"></span>
	 </form>
<br/>

<a href="index.php?hanhdong=add_customer" class="add"><i class="fas fa-plus" style="font-size: 20px;color:white"></i>&nbsp;ADD</a>
<br/><br/>
<div class="box__tbl">
	
	<table class="tbl__db" border="1">
		<thead>
			<tr>
				<td>ID</td>
				<td>Email</td>
				<td>Account</td>
				<td>Ngày sinh</td>
				<td>Giới tính</td>
				<td>Địa chỉ</td>
				<td>Số điện thoại</td>
				<td >Quyền</td>
				<td >Tình trạng</td>
				<td>Ảnh</td>
				<td>Hành động</td>
			</tr>
		</thead>
		<tbody>

			<?php
			echo isset($mes)?$mes:'';
				while($data = mysqli_fetch_array($query))
				{
					if($data["khGioitinh"]==0)
					{
						$gioitinh ='Nam';
					}
					else
					{
						$gioitinh ='Nữ';
					}
					if($data['khTinhtrang']==0)
					{
						$tinhtrang='Bình thường';
						$key = ' <a href="index.php?quanly=tbl_customer&id_lock='.$data["khMa"].'"><i class="icon__unlock fas fa-unlock" style="font-size: 20px;color:green"></i></a>';
					}
					else
					{
						$tinhtrang='Khóa';
						$key = '<a href="index.php?quanly=tbl_customer&id_lock='.$data["khMa"].'"><i class="icon__lock fas fa-lock" style="font-size: 20px;color:red"></i></a>';
					}
					echo '<tr>
						<td>'.$data["khMa"].'</td>
						<td>'.$data["khEmail"].'</td>
						<td>'.$data["khTen"].'</td>
						<td>'.$data["khNgaysinh"].'</td>
						<td>'.$gioitinh.'</td>
						<td>'.$data["khDiachi"].'</td>
						<td>'.$data["khSdt"].'</td>
						<td>'.$data['khQuyen'].'</td>
							<td>'.$tinhtrang.'</td>
						<td><img src="../images/img_customer/'.$data["khHinh"].'" width="100" height="100" alt="Chưa có ảnh"/></td>
						<td><a href="index.php?hanhdong=edit_customer&id='.$data["khMa"].'"><i class="far fa-edit" style="font-size: 20px;color:blue"></i></a> || <a href="index.php?quanly=tbl_customer&id_delete='.$data["khMa"].'">

							<i class="far fa-trash-alt" style="font-size: 20px;color:grey"></i></a> 
							 <br/>
							 '.$key.'
							
					</tr>';
				} 
			?>
			
						 
		</tbody>
	</table>
</div>




