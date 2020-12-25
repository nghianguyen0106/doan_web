<?php require_once('includes/connection.php');
		if(isset($_GET['id_delete']))
		{
			$sql = "delete from tbl_sanpham where spMa ='$_GET[id_delete]'";
			$query = mysqli_query($conn, $sql);
			?>
		<script>
			window.location='index.php?quanly=tbl_product';
		</script>
		<?php } ?>
	<!-------------------end delete--------------> 	
	
	
<h2>Quản lý sản phẩm</h2>
<hr/>

<!------------form search------------->
<form class="form__search" action="" method="POST" enctype="multipart/form-data">
		<input type="text" name="key_search" style="width: 40%;font-size: 21px;padding-left: 1rem;border-radius:10px 0 0 10px;outline: none;border:1px solid black;padding-bottom: 0.05rem;" />

	 	<select name="name_search" style="margin-left: -1rem;width: 20%;font-size: 21px;padding-left: 1rem;padding-bottom: 0.1rem;" >
	 		<option value="tatca">Tất cả sản phẩm</option>
	 		<?php
	 			$sql = "select * from tbl_loai";
	 			$query = mysqli_query($conn,$sql);
	 			while($data = mysqli_fetch_array($query))
	 			{ ?> 
	 				<option value="<?php echo $data["loaiMa"] ?>"><?php echo $data["loaiTen"]; ?></option>
	 			<?php }  ?>
	 		
	 	</select>
	 	<button class="btn__search" type="submit" name="btn_search">
	 		<i class="fas fa-search" style="font-size: 20px;"></i>
	 	</button>
	 	
	 </form>
	 <!--------------------end form search----------------->

<br/>
<a href="index.php?hanhdong=add_product" class="add"><i class="fas fa-plus" style="font-size: 20px;color:white"></i>&nbsp;ADD</a>
<br/><br/>
<div class="row">
	<div class="col-12">
<div class="box__tbl">

	<table class="tbl__db" border="1">
		<thead>
			<tr>
				<td>ID</td>
				<td>Tên sản phẩm</td>
				<td>Mô tả</td>
				<td>Giá</td>
				<td>Hình</td>
				<td>Tình trạng</td>
				<td>Mã loại</td>
				<td>Mã thương hiệu</td>
				<td></td>
			</tr>
			<!---------show database--------->
			<?php
				$sql = "select tbl_sanpham.*, tbl_loai.loaiTen,tbl_thuonghieu.thTen from tbl_sanpham, tbl_loai, tbl_thuonghieu where tbl_loai.loaiMa=tbl_sanpham.loaiMa and tbl_thuonghieu.thMa=tbl_sanpham.thMa ";
				$query = mysqli_query($conn, $sql);
				

			if(isset($_POST["btn_search"]))
			{
				$name_search = $_POST["name_search"];
				$key_search = $_POST["key_search"];
				$key_search = strip_tags($key_search);
				$key_search = addslashes($key_search);
				
				
				if($name_search=="tatca")
				{
					if($key_search=="")
					{
						$sql = "SELECT * from tbl_sanpham";
						$query = mysqli_query($conn, $sql);
					}
					else
					{
						$sql = "SELECT * from tbl_sanpham where spTen like '%$key_search%'";
						$query = mysqli_query($conn, $sql);
						if(mysqli_num_rows($query)==0)
						{
							$mes="<tr><td colspan='9'><h4 style='color:red'>Không có kết quả tìm kiếm!</h4></td></tr>";
						}
					}
				}
				else if($name_search!="tatca")
				{
					if($key_search=="")
					{
						$sql = "SELECT * from tbl_sanpham where loaiMa = '$name_search'";
						$query = mysqli_query($conn, $sql);
					}
					else
					{
						$sql = "SELECT * from tbl_sanpham where spTen like '%$key_search%' and loaiMa = '$name_search'";
						$query = mysqli_query($conn, $sql);
						if(mysqli_num_rows($query)==0)
						{
							$mes="<tr><td colspan='9'><h4 style='color:red'>Không có kết quả tìm kiếm!</h4></td></tr>";
						}
					}
				}	
			} 
			 ?>
			 <?php 
			 echo isset($mes)?$mes:'';
			while($data = mysqli_fetch_array($query))
				{
					$loaiMa=$data["loaiMa"];
					$thMa=$data['thMa'];

					$sqlL =" SELECT * from tbl_loai where loaiMa ='$loaiMa' ";
					$queryL=mysqli_query($conn,$sqlL);
					$dataL=mysqli_fetch_array($queryL);
					$sqlTh =" SELECT * from tbl_thuonghieu where thMa ='$thMa' ";
					$queryTh=mysqli_query($conn,$sqlTh);
					$dataTh=mysqli_fetch_array($queryTh);
					echo '<tr>
						<td>'.$data["spMa"].'</td>
						<td><div class="spTen">'.$data["spTen"].'</div></td>
						<td ><div class="mota">'.$data["spMota"].'</div></td>
						<td>'.number_format($data["spGia"]).'&nbsp;VND</td>
						<td><img src="../images/img_product/'.$data["spHinh"].'" width="100" height="100" alt="Chưa có ảnh"/></td>
						<td>'.$data["spTinhtrang"].'</td>
						<td>'.$dataL["loaiTen"].'</td>
						<td>'.$dataTh["thTen"].'</td>
						<td><a href="index.php?hanhdong=edit_product&id='.$data["spMa"].'"><i class="far fa-edit" style="font-size: 20px;color:green"></i></a> || <a href="index.php?quanly=tbl_product&id_delete='.$data["spMa"].'"><i class="far fa-trash-alt" style="font-size: 20px;color:red"></i></a> </td>
					</tr>';
				} 
			?>
		</thead>
	</table>
</div></div></div>