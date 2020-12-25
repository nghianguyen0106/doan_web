<?php 
require_once('includes/connection.php');
$id=isset($_GET['orderid'])?$_GET['orderid']:'';
$sql="SELECT * from tbl_chitiethoadon where hdMa='$id'";
$query=mysqli_query($conn,$sql);


 ?>

 <form style="text-align: center;" action="index.php?hanhdong=pay&orderid=<?php echo $id?>" method="post" accept-charset="utf-8">
 <fieldset>
 	<legend><h2>Thanh toán hóa đơn</h2></legend>
 	<table border="6" style="text-align: center;width: 100%;">
 		<thead>
 			<tr>
 				<th colspan="5">Hóa đơn</th>
 			</tr>
 			<tr>
 				<th>Mã sp</th>
 				<th>Tên sp</th>
 				<th>Số lượng sp</th>
 				<th>Đơn giá</th>
 				<th>Thành tiền</th>
 			</tr>
 		</thead>
 		<tbody>

 			<?php 
 			$tong=0;
 			while ($data=mysqli_fetch_array($query))
 			{ 
 				$m= $data['spGia']*$data['cthdSoluongsp'];
 				$tong+=$m;
 				$hdma=$data['hdMa'];
 				?>
 			<tr>
 				<td><?php echo $data['hdMa'] ?></td>
 				<td><?php echo $data['spMa'] ?></td>
 				<td><?php echo $data['cthdSoluongsp']?></td>
 				<td><?php echo $data['spGia'] ?></td>
 				<td><?php echo $m ?></td>
 			</tr>
 		<?php	} ?>
 			<tr><td colspan="5">Tổng tiền: <?php echo $tong ?> VND</td></tr>
 			<tr><td colspan="5"><button type="submit" name="btn_pay" style="border:2px solid #D94646;padding: 3px 20px;outline: none;"><b>Thanh toán</b></button></td></tr>
 			 		</tbody>

 	</table>
 </fieldset>
 </form>


 <?php 
 	if(isset($_POST['btn_pay']))
 	{
 		$sql="UPDATE tbl_hoadon set hdTinhtrang =1 where hdMa='$hdma'";
 		mysqli_query($conn,$sql);
 		?>
 		<script>
 			window.location="index.php?quanly=tbl_order";
 		</script>

 		<?php
 	}
  ?>