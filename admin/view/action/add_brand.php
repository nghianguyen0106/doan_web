<?php require_once("includes/connection.php");
      if(isset($_POST["btn_add"]))
      {
      	$ID       = $_POST["ID"];
      	$name = $_POST["name"];
      
      	
      	if($ID=="" || $name=="")
      	{
      		echo "Vui lòng điền đầy đủ thông tin";
      	}
      	else
      	{
      		$sql = "INSERT INTO tbl_thuonghieu(thMa, thTen) values ('$ID', '$name')";
      		$query = mysqli_query($conn, $sql);
      		echo '<p>Thêm thành công!, <a href="index.php?quanly=tbl_brand">quay lại trang trước</a></p>';
      	}
      }
 ?>
<div class="box__form">
	<form class="add__form" method="POSt" action="index.php?hanhdong=add_brand">
		<h3>ADD brand</h3>
		 <span>Mã thương hiệu</span><br/>
		 <input type="number" name="ID" placeholder="..." />
		<br/> <br/>
		 <span>Tên thương hiệu</span><br/>
		 <input type="text" name="name" placeholder="..."/>
		<br/> <br/>
		
		<div class="form__space">
		 <button class="btn__add" type="submit" name="btn_add">Thêm</button>
	    </div>
	</form>
</div>