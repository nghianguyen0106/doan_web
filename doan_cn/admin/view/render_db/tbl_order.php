<?php require_once('includes/connection.php');
		$sql = "select * from tbl_hoadon";
		$query = mysqli_query($conn, $sql);

		if(isset($_GET["id_delete"]))
		{
			$sql = "DELETE from tbl_hoadon where thMa ='$_GET[id_delete]'";
			$query = mysqli_query($conn, $sql);
			?>
		<script>
			window.location='index.php?quanly=tbl_order';
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
					$mes="<tr><td colspan='7'><h4 style='color:red'>Thiếu thông tin tìm kiếm!</h4></td></tr>";
				}
				else
				{
					$sql = "SELECT * from tbl_hoadon where hdMa like '%$name_search%'";
					$query = mysqli_query($conn, $sql);
					if(mysqli_num_rows($query)==0)
					{
						$mes="<tr><td colspan='7'><h4 style='color:red'>Không có kết quả tìm kiếm!</h4></td></tr>";
					}
				}

			
			} 
		?>
		<!------------------------------------------------------>
<h2>Tìm hóa đơn</h2>
<hr/>
<form class="form__search" action="" method="POST" enctype="multipart/form-data">
	 	<input class="input__search" type="text" name="name_search" style="width: 40%;font-size: 21px;padding-left: 1rem;border-radius:10px 0 0 10px;outline: none;border:1px solid black;padding-bottom: 0.05rem;"/>
	 	<button class="btn__search" type="submit" name="btn_search">
	 		<i class="fas fa-search" style="font-size: 20px;"></i>
	 	</button>
	 	<span id="alert__search"></span>
	 </form>
<br/>
<br/><br/>
<div class="box__tbl">
	
	<table class="tbl__db" border="1">
		<thead>
			<tr>
				<td>Mã hóa đơn</td>
				<td>Số lượng sản phẩm</td>
				<td>Ngày tạo</td>
				<td>Tổng tiền</td>
				<td>Mã khách hàng</td>
				<td>Tình trang</td>
				<td></td>
			</tr>
			<?php
						echo isset($mes)?$mes:'';

			$num = mysqli_num_rows($query);
			if( $num == 0 )
					{
						echo '<tr>
						<td colspan="7">Chưa có hóa đơn nào</td>';
					}
				else{
				while($data = mysqli_fetch_array($query))
				{
					if($data['hdTinhtrang']==0)
					{
						$temp='Chưa thanh toán';
					}
					else
					{
						$temp='Đã thanh toán';
					}
					echo '<tr>
						<td>'.$data["hdMa"].'</td>
						<td>'.$data["hdSoluongsp"].'</td>
						<td>'.$data["hdNgaytao"].'</td>
						<td>'.$data["hdTongtien"].'</td>
						<td>'.$data["khMa"].'</td>
						<td>'.$temp.'</td>
						<td> <a href="index.php?hanhdong=pay&orderid='.$data["hdMa"].'">Thanh toán</a> </td>
					</tr>';
				}
				} 
			?>
		</thead>
	</table>
</div>