
<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div style="text-align: center;">
					<h4>Thông tin cá nhân</h4>
					<p>Quản lý các thông tin của bạn như tên, hình ảnh đại diện, email,.....</p>
				</div>
				<hr/>
				<div class="box_info">
					<div class="row justify-content-around">
						<div class="col-2">Avatar:</div>
						<div class="col-5"><img style="width:200px;height: 150px;box-shadow: 5px 10px lightgray;" src="images/img_customer/<?php echo $_SESSION["khHinh"]; ?>"  alt="Chưa có ảnh đại diện"/></div>
					</div>
					<br/>
					<div class="row justify-content-around">
						<div class="col-2">Tên người dùng:</div>
						<div class="col-5"><?php echo $_SESSION["khTen"]; ?></div>
					</div>

					<div class="row justify-content-around">
						<div class="col-2">Email:</div>
						<div class="col-5"><?php echo $_SESSION["khEmail"]; ?></div>
					</div>

					<div class="row justify-content-around">
						<div class="col-2">Địa chỉ</div>
						<div class="col-5"><?php echo $_SESSION["khDiachi"]; ?></div>
					</div>

					<div class="row justify-content-around">
						<div class="col-2">Số điện thoại</div>
						<div class="col-5"><?php echo  $_SESSION["khSdt"] ?></div>
					</div>

					<div class="row justify-content-around">
						<div class="col-2">Giới tính</div>
						<div class="col-5"><?php if( $_SESSION["khGioitinh"] ==0){echo "Nam";} else{echo"Nữ";}?></div>
					</div>
					<div class="row justify-content-around">
						<div class="col-2">Ngày sinh</div>
						<div class="col-5"><?php echo $_SESSION["khNgaysinh"] ?></div>
					</div>
				</div>
				<br/>
				<div class="row justify-content-around">
				<a href="infomation.php?show=edit_info"><button style="color:white; background-color: #113890;border:0;padding: 10px 10px;outline: none">Chỉnh sửa thông tin cá nhân</button></a>
				</div>

				
			</div>
		</div>
	</div>
</section>
