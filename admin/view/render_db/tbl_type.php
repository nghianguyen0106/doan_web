	<?php require_once('includes/connection.php');
		$sql = "select * from tbl_loai";
		$query = mysqli_query($conn, $sql);
	 ?>
	 <?php
	 	if(isset($_GET["id_delete"]))
		{
			$sql = "DELETE from tbl_loai where loaiMa ='$_GET[id_delete]'";
			$query = mysqli_query($conn, $sql);
		?>
		<script>
			window.location='index.php?quanly=tbl_type';
		</script>
		<?php
			
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
					$mes="<tr><td colspan='3'><h4 style='color:red'>Thiếu thông tin tìm kiếm!</h4></td></tr>";
				}
				else
				{
					$sql = "SELECT * from tbl_loai where loaiTen like '%$name_search%'";
					$query = mysqli_query($conn, $sql);
				}
				if(mysqli_num_rows($query)==0)
					{
						$mes="<tr><td colspan='3'><h4 style='color:red'>Không có kết quả tìm kiếm!</h4></td></tr>";
					}

			
			} 
		?>
	 

<!--------------------------------------------------------------------------->
<h2>Quản lý loại sản phẩm</h2>
<hr/>
<form class="form__search" action="" method="POST" enctype="multipart/form-data">
	 	<input class="input__search" type="text" name="name_search" style="width: 40%;font-size: 21px;padding-left: 1rem;border-radius:10px 0 0 10px;outline: none;border:1px solid black;padding-bottom: 0.05rem;" />
	 	<button class="btn__search" type="submit" name="btn_search">
	 		<i class="fas fa-search" style="font-size: 20px;"></i>
	 	</button>
	 	<span id="alert__search"></span>
	 </form>
<br/>

<a href="index.php?hanhdong=add_type" class="add"><i class="fas fa-plus" style="font-size: 20px;color:white"></i>&nbsp;ADD</a>
<br/><br/>
<div class="box__tbl">

	<table class="tbl__db" border="1">
		<thead>
			<tr>
				<td>Mã loại</td>
				<td>Tên loại</td>
				<td>Hành động</td>
			</tr>
			<?php
			echo isset($mes)?$mes:'';
				while($data = mysqli_fetch_array($query))
				{
					echo '<tr>
						<td>'.$data["loaiMa"].'</td>
						<td>'.$data["loaiTen"].'</td>
						<td><a href="index.php?hanhdong=edit_type&id='.$data["loaiMa"].'"><i class="far fa-edit" style="font-size: 20px;color:green"></i></a> || <a href="index.php?quanly=tbl_type&id_delete='.$data["loaiMa"].'"><i class="far fa-trash-alt" style="font-size: 20px;color:red"></i></a> </td>
					</tr>';
				} 
			?>
		</thead>
	</table>
</div>