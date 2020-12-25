<?php
	require("includes/connection.php");
	include ("includes/header.php");
	$id=isset($_GET['id_detail'])?$_GET['id_detail']:'';
	$sql = "select * from tbl_sanpham where spMa = '$id'";
	$query = mysqli_query($conn,$sql);
	$data = mysqli_fetch_array($query);
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div style="text-align: center;">
					<h4>Chi tiết sản phẩm</h4>
					
				</div>
				<hr/>
				<div class="box_info">
					<div class="row justify-content-around" style="border-bottom:1px solid lightgray;">
						<div class="col-2">Hình ảnh sản phẩm:</div>
						<div class="col-5"><img style="width:200px;height: 150px" src="./images/img_product/<?php echo $data["spHinh"]; ?>"/></div>
					</div>
					
					<div class="row justify-content-around" style="border-bottom:1px solid lightgray;">
						<div class="col-2">Tên sản phẩm:</div>
						<div class="col-5"><?php echo $data["spTen"]; ?></div>
					</div>

					<div class="row justify-content-around" style="border-bottom:1px solid lightgray;">
						<div class="col-2">Giá:</div>
						<div class="col-5"><?php echo number_format($data["spGia"]);?> VND</div>
					</div>

					<div class="row justify-content-around" style="border-bottom:1px solid lightgray;">
						<div class="col-2">Mô tả:</div>
						<div class="col-5"><?php echo $data["spMota"]; ?></div>
					</div>

					<div class="row justify-content-around" style="border-bottom:1px solid lightgray;">
						<div class="col-2">Tình trạng:</div>
						<div class="col-5"><?php if($data["spTinhtrang"]==0){echo "Hết hàng";} else{echo "Còn hàng";}   ?></div>
					</div>

					
				</div>
				<br/>
				<div class="row justify-content-around">
				<form method="POST" action="">
				<button type="submit" name="btn_buy"  style="color:white; background-color: #113890;border:0;padding: 10px 10px;outline: none"><div class="add_to_cart" >
									<?php echo '<a href="addtocard.php?spMa='.$data['spMa'].'&action=add&soluong=1&tinhtrang='.$data['spTinhtrang'].'">Đặt hàng</a>'; ?>
							</div></button>
				</form>
				</div>	
			</div>
		</div>
	</div>
</section>
<br/>
<h4>&emsp;Các sản phẩm bạn có thể thích</h4>

<section class="content__product">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
			
			<?php 
				$sql = "select * from tbl_sanpham order by rand() limit 4";
				$query = mysqli_query($conn,$sql);
				while ( $data = mysqli_fetch_array($query) )
				{
					echo '
					<div class="col-lg-3 col-sm-12 ">
						<div class="content__product--item">
							<div class="show__detail" id="show__detail"><a href="detail_product.php?show=show_detail&id_detail='.$data["spMa"].'"><i class="fa fa-arrows-alt" style="color:white;font-size: 25px;"></i></a></div>
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
<br/><br/><br/>
<?php include ("includes/footer.php"); ?>