<?php 
	
	require("includes/connection.php");
	include ("includes/header.php");


$alertpay= isset($_GET['alertpay'])?$_GET['alertpay']:'';
if($alertpay!=null)
{?>
<script> alert('Giỏ hàng của bạn trống chọn 1 sản phẩm ưng ý và tiến hàng đặt hàng nào !');</script>
<?php }
$payok= isset($_GET['payok'])?$_GET['payok']:'';
if($payok!=null)
{?>
<script> alert('Đặt hàng thành công!');</script>
<?php }
$outofstock=isset($_GET['alertoutofstock'])?$_GET['alertoutofstock']:'';
if($outofstock!=null)
{ ?>
	<script>alert('Sản phẩm tạm hết hàng!')</script>
<?php }

?>
<section id="slide" >
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 col-sm-10" >
			      <img  src="images/imgs_slide/img1.png" alt="First slide" height="380" width="100%" />
			</div>
		
			<div class="col-lg-4 col-sm-9">
				<img class="index__banner" style="height: 200px;width: 100%;" src="//theme.hstatic.net/1000026716/1000440777/14/solid2.jpg?v=15900">
				<img  class="index__banner" style="height: 200px;width:100%;" src="//theme.hstatic.net/1000026716/1000440777/14/xxxbanner2.jpg?v=15900">
			</div>
			</div>
		</div>
		<br/>
		<div class="row ">
					<div class="index__banner col-lg-4 col-sm-9"><img style="height: 200px;width: 100%;" src="//theme.hstatic.net/1000026716/1000440777/14/solid4.jpg?v=15900"></div>

					<div class="index__banner col-lg-4 col-sm-9"><img style="height: 200px;width: 100%;" src="//theme.hstatic.net/1000026716/1000440777/14/solid5.jpg?v=15900"></div>
				
					<div class="index__banner col-lg-4 col-sm-9"><img  style="height: 200px;width: 100%;" src="//theme.hstatic.net/1000026716/1000440777/14/solid1.jpg?v=15900"></div>			
		</div>
	</div>
	</div>
</section>

<br/><br/>
<div class="col-12"><h3 style=" text-shadow: blue 0.2em 0.2em 0.3em">LAPTOP mới nhất</h3></div>
		<hr/>

<section class="content__product">
	<div class="container">
		<div class="row justify-content-around">
			<div class="col-lg-12">
				<div class="row justify-content-around index__item" >
			
			<?php 
				$sql = "select * from tbl_sanpham where loaiMa='1' order by spMa desc limit 8";
				$query = mysqli_query($conn,$sql);
				while ( $data = mysqli_fetch_array($query) )
				{
					echo '
					<div class="col-lg-3 col-sm-12 ">
						<div class="content__product--item">
							<div class="show__detail" id="show__detail"><a href="detail_product.php?id_detail='.$data["spMa"].'"><i class="fa fa-arrows-alt" style="color:white;font-size: 25px;"></i></a></div>
							<img id="item__img" class="item__img" src="images/img_product/'.$data["spHinh"].'" />
							<br/>
							<div class="item__detail">
								<div class="proName">'.$data["spTen"].'</div>	
								<div class="proPrice">'.number_format($data["spGia"]).' VND</div>
								
							</div>
							<div class="add_to_cart" >
								<a href="addtocard.php?spMa='.$data['spMa'].'&action=add&soluong=1&tinhtrang='.$data['spTinhtrang'].'"><div>Thêm vào giỏ hàng</div></a>
							</div>
						</div>
					</div> ';
				}
			
			?>
			
			<!------end item------>
		</div>
			</div>
		</div>
</section>
<br/><br/>
<hr/>
<section >
	<div class="container-fluid show__big">
		<div class="col-12">
			<div class="row justify-content-around">

				<div class="col-lg-6 col-sm-6">
					<?php 
						$sql1 = "Select * from tbl_sanpham order by RAND() limit 1";
							$query = mysqli_query($conn,$sql1);
							$data2=mysqli_fetch_array($query);
						 ?>
						 
					<div class="show__big--product">
						<img src="images/img_product/<?php echo $data2['spHinh'] ?>" />
					</div>
				</div>
				<div class="col-lg-6 col-sm-12">
					<div class="show__big--detail">
						<h3><?php echo $data2['spTen'] ?></h3>
						<h4>Giá: <?php echo number_format($data2['spGia'])?> VND </h4><br/>
						<div class="mota"><?php echo $data2['spMota'] ?></div><br/>
						<a href="detail_product.php?id_detail=<?php echo $data2['spMa']?> "><button>Xem thêm</button></a>
					</div>
					<br/>
				</div>
				
			</div>
		</div>
	</div>
</section>
<br/><br/>

<section class="content__product">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">

				<div class="row">
				<div class="col-12"><h3 style=" text-shadow: blue 0.2em 0.2em 0.3em">PC mới nhất</h3><hr/></div>
			<?php 
				$sql = "select * from tbl_sanpham where loaiMa = '3' order by spMa desc limit 8";
				$query = mysqli_query($conn,$sql);
				while ( $data = mysqli_fetch_array($query) )
				{
				echo '
					<div class="col-lg-3 col-sm-12 ">
						<div class="content__product--item">
							<div class="show__detail" id="show__detail"><a href="detail_product.php?id_detail='.$data["spMa"].'"><i class="fa fa-arrows-alt" style="color:white;font-size: 25px;"></i></a></div>
							<img id="item__img" class="item__img" src="images/img_product/'.$data["spHinh"].'" />
							<br/>
							<div class="item__detail">
								<div class="proName">'.$data["spTen"].'</div>	
								<div class="proPrice">'.number_format($data["spGia"]).' VND</div>
								
							</div>
							<div class="add_to_cart" >
								<a href="addtocard.php?spMa='.$data['spMa'].'&action=add&soluong=1&tinhtrang='.$data['spTinhtrang'].'"><div>Thêm vào giỏ hàng</div></a>
							</div>
						</div>
					</div> ';				}
			
			?>
<a href="cart.php?spMa="></a>
			<!------end item------>
		</div>
			</div>
		</div>
</section>
<br/><br/><br/><br/>



<?php include ("includes/footer.php"); ?>
