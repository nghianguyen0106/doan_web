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


<section class="content__about">
	<div class="container-fluid">
			<br/>
			<div class="row"style="padding-left: 5%">
				<div class="col-xs-11 col-sm-11 col-md-10 col-lg-10" style="text-align: center;" >
					<img src="images/label.jpg"><br/>
					<br/>
					<p class="text">
					&nbsp;Thời đại 4.0 thời đại của công nghệ với muôn màn thiết bị điện tử tiện lợi và chất lượng. Có được các thiết bị mới và tiện ích nhất là điều tốt nhất cho chúng ta. Nhưng có được một nơi đáng tin cậy để tìm kiếm, mua và sử dụng là điều cần thiết hơn vì chất lượng sản phẩm tốt và giá cả không quá đắt đỏ so với thị trường sẽ giúp bạn yên tâm khi sử dụng sản phẩm. Vì thế <b>DUTY</b> chúng tôi luôn sẵn lòng phục vụ bạn một cách tốt nhất.
					<br/>
					&nbsp;Công ty TNHH Best Gear thành lập vào tháng 03/2020 bởi 5 thành viên đồng sáng lập là Lê Trung Nhân, Nguyễn Chí Nghĩa các lĩnh vực liên quan đến thương mại điện tử. Cùng với việc nghiên cứu kỹ tập quán mua hàng của khách hàng Việt Nam, BG đã xây dựng một phương thức kinh doanh chưa từng có ở Việt Nam trước đây.
				</p>
				</div>
				
			</div>
			
			
</section>
<br/><br/><br/><br/>



<?php include ("includes/footer.php");
	
