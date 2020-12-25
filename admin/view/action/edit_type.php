<?php include("includes/connection.php");
   					if (!isset($_GET["id"]))
                        {
                        //If not isset -> set with dumy value
                            $_GET["id"] = "undefine";
                        } 
		$sql = "select * from tbl_loai where loaiMa = '$_GET[id]'";
					$query = mysqli_query($conn,$sql);
					$data = mysqli_fetch_array($query);
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
         $sql = "UPDATE tbl_loai SET loaiTen='$name' where loaiMa ='$ID'";
         $query = mysqli_query($conn, $sql);
         if($query)
         {
             ?>
         <script>
            window.location='index.php?quanly=tbl_type';
         </script>
         <?php
         }
         else{ echo 'Update failed'; }
        }
      	
      	
      }
 ?>
<div class="box__form">
	<form class="add__form" method="POSt" action="index.php?hanhdong=edit_type">
		<h3>EDIT type</h3>
		 <span>Mã loại</span><br/>
		 <input class="input_readonly" type="number" name="ID" readonly  value="<?php echo $data["loaiMa"] ?>" />
		<br/> <br/>
		 <span>Tên loại</span><br/>
		 <input type="text" name="name" value="<?php echo $data["loaiTen"] ?>"/>
		<br/> <br/>
		
		<div class="form__space">
		 <button class="btn__edit" type="submit" name="btn_edit">Cập nhật</button>
	    </div>
	</form>
</div>