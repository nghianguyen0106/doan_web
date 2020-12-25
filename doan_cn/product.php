<?php 
 
	require("includes/connection.php");
	include ("includes/header.php");
	$sql="SELECT * from tbl_sanpham where loaiMa=1";
	$query=mysqli_query($conn,$sql);
	$numb=mysqli_num_rows($query);
	$sql2="SELECT * from tbl_sanpham where loaiMa=3";
	$query2=mysqli_query($conn,$sql2);
	$numb2=mysqli_num_rows($query2);

?>


<section class="content__product">
	<div class="container-fluid">
		<div class="row">
			<!------------Category------------->
			<div class="col-lg-2">
				<div class="list__category" style="border-right: 1px solid lightblue;">
					<h4 style=" text-shadow: blue 0.2em 0.2em 0.3em">Tìm kiếm theo loại</h4>
					<hr/>
					<span><a href="product.php?show=show_laptop" style="text-decoration: none;color:black;font-weight: bold">LAPTOP [<?php echo $numb ?>]</a></span>
					<br/><br/>
					<span><a href="product.php?show=show_PC" style="text-decoration: none;color:black;font-weight: bold">PC  [<?php echo $numb2 ?>]</a></span>
				</div>
			</div>
			<br/>
			<!------------end category-------->
			<div class="col-lg-10">
				<h4 style=" text-shadow: blue 0.2em 0.2em 0.3em">Danh mục sản phẩm</h4>
					<hr/>
	 		<!-------item---------->
	 		<div class="row">
				<?php include ("includes/render_category.php"); ?>
			<!------end item------>
			</div>
			</div>
		</div>
</section>
<br/><br/><br/><br/>



<?php include ("includes/footer.php");
	
