	<!------------form search------------->
			 <?php
							$sql = "select * from tbl_sanpham where loaiMa = 3";
							$query = mysqli_query($conn,$sql);
							
						if(isset($_POST["btn_search"]))
						{
							$key_search = $_POST["key_search"];
							$key_search = strip_tags($key_search);
							$key_search = addslashes($key_search);

							if($key_search=="")
							{
							$mess= '<span style="color:red;">Bạn chưa nhập tên sản phẩm bạn muốn tìm!</span>';
							}
							else
							{				
									$sql = "select * from tbl_sanpham where  spTen like '%$key_search%' and loaiMa = 3";
									$query = mysqli_query($conn,$sql);
									if(mysqli_num_rows($query)==0)
									{
									$mess='<span style="color:red;">Không tìm tháy sản phẩm phù hợp!!</span>';
									}
							}
							}
						
					?>		
		<form class="form__search" action="" method="POST" enctype="multipart/form-data">
			<input type="text" name="key_search" style="width: 40%;font-size: 21px;padding-left: 1rem;border-radius:10px 0 0 10px;outline: none;border:1px solid black;padding-bottom: 0.05rem;" />

		 
		 	<button class="btn__search" type="submit" name="btn_search">
		 		<i class="fas fa-search" style="font-size: 20px;"></i>
		 	</button>
		 		<?php echo isset($mess)?$mess:""; ?>
		 		
		 </form>

	 <!--------------------end form search----------------->
<div class="row">	
<?php 	
				
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
								<a href="addtocard.php?spMa='.$data['spMa'].'&action=add&soluong=1"><div>Thêm vào giỏ hàng</div></a>
							</div>
						</div>
					</div> ';
				}
			
?>
</div>