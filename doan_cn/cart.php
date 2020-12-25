<?php 
	require("includes/connection.php");
	include ("includes/header.php");
?>
<br/><br/>

			


<section class="tbl__cartItem">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 tbl__cartItem--box">
				<div class="row">
					<div class="col-1 show__name">Numb</div>
					<div class="col-2 show__name">Product Name</div>
					<div class="col-1 show__amount">Product amount</div>
					<div class="col-1 show__amount">Brand</div>
					<div class="col-2 show__price">Product Price</div>
					<div class="col-2 show__amount">Total</div>
					<div class="col-2 show__amount">Action</div>
					<div class="col-1 show__amount" style="text-align: center;">Action</div>
					
				</div>
			</div>
			<div class="col-12 show__product">
				<?php
						$i=0;
						$total=0;
						if(isset($_SESSION['cart']))
						{
							foreach ($_SESSION['cart'] as $key => $v) 
							{
								$i++;
								
								$sql2="SELECT * from tbl_sanpham,tbl_thuonghieu where tbl_thuonghieu.thMa = tbl_sanpham.thMa and spMa='$key' ";
								$query=mysqli_query($conn,$sql2);
								$data =mysqli_fetch_array($query);
								$money=$v*$data['spGia'] ;
								$total=$total+$money;

								?>
								<div class="row" style="text-align: center;">
										<div class="col-1 show__name"><?php echo $i ?></div>
										<div class="col-2 show__name"><?php echo $data['spTen'] ?></div>
										<div class="col-1 show__amount"><?php echo $v   ?></div>
										<div class="col-1 show__amount"><?php echo $data['thTen']   ?></div>
										<div class="col-2 show__price"><?php echo number_format($data["spGia"]) ?></div>
										<div class="col-2 show__amount"><?php echo number_format($money)?> VND</div>
										<div class="col-2 show__amount" style="display: flex;flex-direction: row;align-items: center;justify-content:center;">
											<a href="addtocard.php?action=tang&spMa=<?php echo $data['spMa']?>" ><i class="fas fa-plus-square" style="font-size: 25px;"></i></a>&emsp;|&emsp;
											<a href="addtocard.php?action=giam&spMa=<?php echo $data['spMa']?>" ><i class="fas fa-minus-square" style="font-size: 25px;"></i></a>
										</div>
										<div class="col-1 show__amount"  style="display: flex;flex-direction: row;align-items: center;justify-content:center;">
											<a href="addtocard.php?action=xoa&spMa=<?php echo $data['spMa']?>"><i class="fas fa-trash-alt" style="font-size: 25px;color:red"></i></a>
										</div>
								</div>
					<?php 	}
						}
						
					 ?>
			

				

			</div>
			<br/><br/><br/>
			<div class="col-12" style="text-align: right;">
				<h5>Total Price:&nbsp;<span class="show__total"><?php echo number_format($total) ?> VND</span></h5>		
			</div>
		</div>
	</div>
</section>
<?php 
	if(isset($_SESSION['cart']))
	{
	if($_SESSION['cart']==null)
	{
		unset($_SESSION['cart']);
	} 
	?>
	<div style="position: absolute;right:2.5%;font-size: 20px">
		<a  href="payment_confirmation.php" ><button style="padding: 0px 15px 0px 15px;border:0;outline:none;background-color: green;color:white;font-weight: bold;">Thanh toán</button></a>&emsp;
		<a href="addtocard.php?action=huy"><button style="padding: 0px 15px 0px 15px;border:0;outline:none;background-color: red;color:white;font-weight: bold;">Xóa tất cả</button></a>
	</div>
	 <?php }
 ?>


<br/><br/><br/>
<?php include ("includes/footer.php"); ?>

