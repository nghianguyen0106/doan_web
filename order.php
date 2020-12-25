<?php 
	
	require("includes/connection.php");
	include ("includes/header.php");
	

?>
<br/><br/>
<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
			<?php
				$sql = "SELECT * from tbl_hoadon where khMa = '$_SESSION[khMa]' order by hdNgaytao DESC ";
				$query = mysqli_query($conn,$sql);
				$numrow=mysqli_num_rows($query);
				if($numrow>0)
				{
			
					while ($data= mysqli_fetch_array($query)) 
					{	
				
						if($data['hdTinhtrang']==0)
						{
							$temp='Chưa thanh toán';
						}
						else
						{
							$temp='Đã thanh toán';
						}
						echo '
							<div class="row">
						<table class="tbl__order" border="1">
						<tr><td><h3>Đơn hàng '.$data['hdMa'].'</td></tr>
							<tr>
								<td><b>Số lượng sản phẩm:</b>&nbsp;'.$data["hdSoluongsp"].'</td>
							</tr>
							<tr>
								<td><b>Ngày tạo:</b>&nbsp;'.$data["hdNgaytao"].'</td>
								
							</tr>
							<tr>
								<td><b>Tổng tiền:</b>&nbsp;'.$data["hdTongtien"].' VND</td>
								
							</tr>
							<tr>
								<td><b>Tình trạng:</b>&nbsp;'.$temp.'</td>
								
							</tr>
						</table>
						</div>
						 <br><br>';
	
					}
					
				}
				else
				{
					echo "<h4>Bạn chưa có hóa đơn nào</h4>";
				}
				
			 ?>
							</div>
</div>
</div>
</section>

<br/><br/>
<?php include ("includes/footer.php"); ?>