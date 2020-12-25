<?php include("includes/connection.php");
			if (!isset($_GET["id"]))
                        {
                        //If not isset -> set with dumy value
                            $_GET["id"] = "undefine";
                        } 
			$sql = "select * from tbl_thuonghieu where thMa = '$_GET[id]' ";
					$query = mysqli_query($conn,$sql);
					$data = mysqli_fetch_array($query);
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
		}
	
      if(isset($_POST["btn_edit"]))
      {
     	 $ID       = $_POST["ID"];
      	$name = $_POST["name"];
      	if($ID=="" || $name=="")
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
      	
         $sql1 = "UPDATE tbl_thuonghieu SET thTen ='$name' where thMa='$ID' ";
         $query1 = mysqli_query($conn, $sql1);
          if($query)
         {
           ?>
			<script>
				window.location='index.php?quanly=tbl_brand';
			</script>
			<?php
         }
         else{ echo 'Update failed'; }
     }
      	
      	
      }
 ?>
<div class="box__form">
	<form class="add__form" method="POSt" action="index.php?hanhdong=edit_brand">
		<h3>EDIT brand</h3>
		 <span>Mã thương hiệu</span><br/>
		 <input class="input_readonly" readonly type="number" name="ID"  value="<?php echo $data["thMa"] ?>" />
		<br/> <br/>
		 <span>Tên thương hiệu</span><br/>
		 <input type="text" name="name" value="<?php echo $data["thTen"] ?>"/>
		<br/> <br/>
		
		<div class="form__space">
		 <button class="btn__edit" type="submit" name="btn_edit">Cập nhật</button>
	    </div>
	</form>
</div>