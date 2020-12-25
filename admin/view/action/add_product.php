
<?php require_once("includes/connection.php");
    if(isset($_POST["btn_add"]))
    {
    	$ID = $_POST["ID"];
    	$name = $_POST["name"];
    	$moTa = $_POST["post_content"];
    	$gia = $_POST["gia"];
    	$tinhTrang = $_POST["tinhTrang"];
    	$maLoai = $_POST["maLoai"];
    	$maTh = $_POST["maTh"];
    	////hinh///
    	$img = $_FILES["hinh"]["name"];
    	$path = "../images/img_product/".basename($_FILES["hinh"]["name"]); 
    	$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    	$test = pathinfo($img, PATHINFO_EXTENSION);
    	///end hinh////

    	if($ID ==""|| $name ==""||$gia==""||$moTa ==""||$tinhTrang==""||$maLoai==""||$maTh==""||$img=="")
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
    		if($gia < 0)
    		{
    			echo "Giá không được nhỏ hơn 0";
    		}
    		else
    		{
    			if(!array_key_exists($test, $allowed)) 
		    	{
		    		echo "Vui lòng chọn đúng file hình ảnh để thêm vào thông tin sản phẩm ";
		    	}
    			else{
    				$sql = "INSERT INTO tbl_sanpham(spMa,spTen,spMota,spGia,spHinh,spTinhtrang,spNgaytao,loaiMa,thMa) values('$ID','$name','$moTa','$gia','$img' ,'$tinhTrang',now(),'$maLoai','$maTh')";
			    	$query = mysqli_query($conn, $sql);
			    	if(move_uploaded_file($_FILES["hinh"]["tmp_name"], $path))
			    		{
			    			echo '<p>Thêm thành công!, <a href="index.php?quanly=tbl_product">quay lại trang trước</a></p>';
			    		}

    			}
			 }
    	}
    	
    }  
 ?>
    
<div class="box__form">
	<form class="add__form" method="POST" action="index.php?hanhdong=add_product"  enctype="multipart/form-data">
		<h3>ADD product</h3>
		 <span>Mã sản phẩm</span><br/>
		 <input type="text" name="ID" placeholder="..." />
		<br/> <br/>
		 <span>Tên sản phẩm</span><br/>
		 <input type="text" name="name" placeholder="..."/>
		<br/> <br/>
		 <span>Mô tả</span><br/>
		<textarea name="post_content" id="post_content" style="width: 100%"></textarea>
		<br/><br/>
		 <span>Giá</span><br/>
		 <input type="number" name="gia"/>
		<br/> <br/>
		 <span>Hình</span><br/>
		 <input type="file" name="hinh" accept="image/x-png,image/gif,image/jpeg"/>
		<br/> <br/>
		<span>Tình trạng</span><br/>
		 <input type="number" name="tinhTrang"/>
		<br/> <br/>
		
		<span>Mã loại</span><br/>
		<select name="maLoai">
		<?php
			$sql = "SELECT * from tbl_loai";
			$query = mysqli_query($conn, $sql);
			while ($data = mysqli_fetch_array($query)) { ?>
			 	<option value="<?php echo $data["loaiMa"] ?>"><?php echo $data["loaiTen"] ?></option>
			<?php  } 
		?>
		</select>

		 <br/> <br/> 
		
		<span>Mã thương hiệu</span><br/>
		<select name="maTh"  >
		<?php
			$sql = "SELECT * from tbl_thuonghieu";
			$query = mysqli_query($conn, $sql);

			while ($data = mysqli_fetch_array($query)) { ?>
			 	<option value="<?php echo $data["thMa"] ?>"><?php echo $data["thTen"]  ?></option>
			<?php  } 
		?>
		</select>
		<br/> <br/>
		<div class="form__space">
		 <button class="btn__add" type="submit" name="btn_add">Thêm</button>
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
