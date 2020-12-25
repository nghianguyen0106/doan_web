<?php 
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
						<div class="col-5"><?php echo $data["spGia"];?> VND</div>
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
				<form method="POST" action="detail_product.php?show=show_detail">
				<button type="submit" name="btn_buy"  style="color:white; background-color: #113890;border:0;padding: 10px 10px;outline: none"><div class="add_to_cart" >
									<?php echo '<a href="./addtocard.php?spMa='.$data['spMa'].'&action=add&soluong=1" style="color:white;">Đặt hàng</a>'; ?>
							</div></button>
				</form>
				</div>	
			</div>
		</div>
	</div>
</section>
<br/><br/>
<hr/>

