<?php include ("includes/connection.php");
		$id=isset($_GET['id'])?$_GET['id']:'';
		$sql = "SELECT * FROM tbl_sanpham where spMa ='$id'";
		$query = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($query);
 
		if(isset($_POST["btn_edit"])) 
		{
			$ID = $_POST["ID"];
	    	$name = $_POST["name"];
	    	$moTa = $_POST["post_content"];
	    	$gia = $_POST["gia"];
	    	$tinhTrang = $_POST["tinhTrang"];
	    	$loaiMa = $_POST["loaiMa"];
	    	$maTh = $_POST["maTh"];
	    	//hinh//
	    	$img = $_FILES["hinh"]["name"];
	    	$path = "../images/img_product/".basename($_FILES['hinh']['name']);
	    	$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png",""=>"image/''");
    		$test = pathinfo($img, PATHINFO_EXTENSION);
	    	//end hinh//
	    	
	    	
	    	if($ID ==""|| $name ==""||$gia==""||$moTa ==""||$tinhTrang=="")
	    	{
	    		?>
				   <script>
		 			alert("Vui lòng điền đầy đủ thông tin");
				    window.history.back();
				   </script>
				   <?php
	    	}
	    	else
	    	{
	    		if(isset($name))
	    		{
		    			$sql1 = "UPDATE tbl_sanpham SET spTen='$name'where spMa='$ID' "; 
					         $query1 = mysqli_query($conn, $sql1);
				}
	    		if(isset($moTa))
	    		{
		    			$sql1 = "UPDATE tbl_sanpham SET spMota='$moTa'where spMa='$ID' "; 
					         $query1 = mysqli_query($conn, $sql1);
				}
		      	if($gia < 0)
	    		{
	    			?>
				    		<script>
				    			alert("Giá không được nhỏ hơn 0");
				    			window.history.back();
				    		</script>
				    		<?php
	    		}
	    		else
	    		{
		    			$sql1 = "UPDATE tbl_sanpham SET spGia='$gia'where spMa='$ID' "; 
					         $query1 = mysqli_query($conn, $sql1);
				}
					if(!array_key_exists($test, $allowed)) 
				    	{
				    		?>
				    		<script>
				    			alert("Vui lòng chọn đúng file ảnh");
				    			window.history.back();
				    		</script>
				    		<?php
				    	}
				    	else
				    	{
			    			if($img != null)
				      		{
				      			$tmp_img = $_FILES["hinh"]["tmp_name"];
					      		$img = $_FILES['hinh']['name'];
					      		move_uploaded_file($tmp_img, $path);
					      		$sql = "UPDATE tbl_sanpham SET spHinh ='$img' where spMa='$ID' ";
					      		$query = mysqli_query($conn, $sql);
				      		}
						}
						if($loaiMa!=null)
			      		{
			      			$sql1 = "UPDATE tbl_sanpham SET loaiMa='$loaiMa'where spMa='$ID' "; 
					         $query1 = mysqli_query($conn, $sql1);
			      		}
			      		if($maTh !=null)
			      		{
			      			 $sql = "UPDATE tbl_sanpham SET thMa='$maTh' where spMa='$ID' "; 
					         $query = mysqli_query($conn, $sql);
			      		}
			}
			?>
						<script>
							window.location='index.php?quanly=tbl_product';
						</script>

			<?php
	}
?>

<div class="box__form">
	<form class="add__form" method="POST" action="index.php?hanhdong=edit_product"  enctype="multipart/form-data">
		<h3>EDIT product</h3>
		 <span>Mã sản phẩm</span><br/>
		 <input class="input_readonly" type="text" readonly name="ID" value="<?php echo $data['spMa'] ?>" />
		<br/> <br/>
		 <span>Tên sản phẩm</span><br/>
		 <input type="text" name="name" value="<?php echo $data['spTen'] ?>"/>
		<br/> <br/>
		 <span>Mô tả</span><br/>
		<textarea name="post_content" id="post_content" style="width: 100%"> <?php echo $data['spMota'] ?></textarea>
		<br/><br/>
		 <span>Giá</span><br/>
		 <input type="number" name="gia" value="<?php echo $data['spGia'] ?>"/>
		<br/> <br/>
		 <span>Hình</span><br/>
		 <input type="file" name="hinh" value="<?php echo $data['spHinh'] ?>"/>
		<br/> <br/>
		<span>Tình trạng</span><br/>
		 <input type="number" name="tinhTrang" value="<?php echo $data['spTinhtrang'] ?>"/>
		<br/> <br/>

		<span>Mã loại</span><br/>
		<select name="loaiMa">
			<option>
				<?php
				$sql = "select * from tbl_sanpham, tbl_loai where spMa ='$id' and tbl_sanpham.loaiMa = tbl_loai.loaiMa";
				$query = mysqli_query($conn,$sql);
				$data = mysqli_fetch_array($query);
				echo $data["loaiTen"];
				 ?>
			</option>
		<?php
			$sql = "select * from tbl_loai";
			$query = mysqli_query($conn, $sql);
			while ($data = mysqli_fetch_array($query)) { ?>
			 	<option value="<?php echo $data['loaiMa']; ?>"><?php echo $data["loaiTen"]; ?></option>
			<?php  } ?>
		</select>
		 <br/> <br/> 
		
		<span>Mã thương hiệu</span><br/>
		<select name="maTh">
			<option>
				<?php
				$sql = "select * from tbl_sanpham, tbl_thuonghieu where spMa ='$id' and tbl_sanpham.thMa = tbl_thuonghieu.thMa";
				$query = mysqli_query($conn,$sql);
				$data = mysqli_fetch_array($query);
				echo $data["thTen"];
				 ?>
			</option>
			<?php
			$sql = "select * from tbl_thuonghieu";
			$query = mysqli_query($conn, $sql);
			while ($data = mysqli_fetch_array($query)) { ?>
			 	<option value="<?php echo $data['thMa'] ?>"><?php echo $data["thTen"] ?></option>
			<?php  } ?>
		</select>
		<br/> <br/>
		<div class="form__space">
		 <button class="btn__edit" type="submit" name="btn_edit">Sửa</button>
	    </div>
	</form>
</div>
<!-------checkdirto---->

<script>
    // Thay thế <textarea id="post_content"> với CKEditor
    
  //  CKEDITOR.replace( 'post_content' );// tham số là biến name của textarea
  CKEDITOR.replace( 'post_content',
{
startupFocus : true,
toolbar :
[
['ajaxsave'],['Styles', 'Format', 'Font', 'FontSize'],
['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
['Cut','Copy','Paste','PasteText'],
['Undo','Redo','-','RemoveFormat'],
['TextColor','BGColor'],
['Maximize', 'Table']
],
//filebrowserUploadUrl : 'admin/view/action/edit_product.php' // you must write path to filemanager where you have copied it.
});
        
</script>
<!---------end checkdirto--------------------->