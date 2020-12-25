<?php 

require_once('includes/connection.php');
include('includes/header.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(!isset($_SESSION['khMa']))
{
	echo "	<script>
				window.location='login.php?mes=Vui lòng đăng nhập để thanh toán!';
			</script>";

}
if(!isset($_SESSION['cart']))
{
	echo "	<script>
				window.location='index.php?alertpay=ok';
			</script>";
}
$slsp=0;
foreach ($_SESSION['cart'] as $k => $v) 
{
	$slsp+=$v;

}



	
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="row justify-content-around">
				<div  class="col-12" >
					<br/>
					<table style="text-align: center;width: 100%;" border="1">
					<thead>
						<tr style="background-color: #A8A2A2">
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Đơn giá</th>
							<th >Thành tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$tongtien=0;
						$i=0;
						foreach ($_SESSION['cart'] as $key => $v) 
							{
								$sql= "select * from tbl_sanpham where spMa='$key'";
								$query = mysqli_query($conn,$sql);
								$data =mysqli_fetch_array($query);				
								$money=$v*$data['spGia'] ;
								$tongtien+=$money;
								?>
								<tr >
										<td ><?php echo $data['spTen'] ?></td>
										<td><?php echo $v ?></td>
										<td ><?php echo $data['spGia'] ?>&nbsp;VND</td>
										<td ><?php echo $money?>&nbsp;VND</td>
								</tr>
					<?php $i++;	} ?>
					<tr >
						<td style="font-weight: bold;"> Tổng tiền</td>
						<td colspan="3" style="font-weight: bold;"><?php echo number_format($tongtien) ?>&nbsp;VND</td>
					</tr>
					</tbody>
				</table>
				</div>

					<form action="" method="post" accept-charset="utf-8">
						<br/><br/>
						<button type="submit" name="btn" style="padding: 5px 15px 5px 15px;border:0;outline:none;background-color: green;color:white;font-weight: bold;"> Xác nhận thanh toán </button>
					</form>
			</div>
		</div>
	</div>
</div>
<?php 
if(isset($_POST['btn']))
{

	$khMa=$_SESSION['khMa'];
	$khTen=substr($_SESSION['khTen'],0,3);
	$rand=rand(1,100);
	$mahoadon=$rand.$khTen.$tongtien;
	echo " <h3 style='text-align: center;'><i>Hệ thống đang xác nhận đơn hàng ....</i></h3>";
	if(strlen($mahoadon)>6)
	{
		$temp=0;
	if(isset($_SESSION['cart']))
		{
			foreach ($_SESSION['cart'] as $k => $v) 
			{
			$temp+=$v;
			}
		}
			//start tao hoa don
		$sql="INSERT into tbl_hoadon(hdMa,hdSoluongsp,hdNgaytao,hdTongtien,khMa,hdTinhtrang)values('$mahoadon','$slsp',now(),'$tongtien','$khMa',0)";
		$query=mysqli_query($conn,$sql);
		// end tao hoa don
		// 
		// start them chi tiet san pham
		foreach ($_SESSION['cart'] as $key => $v) 
		{
			$sql= "select * from tbl_sanpham where spMa='$key'";
			$query = mysqli_query($conn,$sql);
			$data =mysqli_fetch_array($query);
			$gia=$data['spGia'];
			$sql2="INSERT into tbl_chitiethoadon(hdMa,spMa,spGia,cthdSoluongsp)values('$mahoadon','$key','$gia','$v')";
			$query=mysqli_query($conn,$sql2);
			unset($_SESSION['cart']);
			echo "	<script>
				window.location='order.php?payok=ok';
			</script>";
	

	} 	
	}
	
	
							
}

?>
<br/><br/><br/>
<?php include("includes/footer.php"); 
if (isset($_POST['btn'])) 
{           
	
	$contentemail='Mã đơn hàng: '.$mahoadon.'<br>Số lượng sản phẩm: '.$temp.'<br>Số tiền: '.number_format($tongtien).' VND<br>'.'<h3 style="text-align: center;font-weight:bold;">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi !</h3>';
                include 'library.php'; 
                require 'vendor/autoload.php';
                $mail = new PHPMailer(true);                              
                try {
                    //Server settings
                    $mail->CharSet = "UTF-8";
                    $mail->SMTPDebug = 1;                               
                    $mail->isSMTP();                                  
                    $mail->Host = SMTP_HOST;  
                    $mail->SMTPAuth = true;                          
                    $mail->Username = SMTP_UNAME;    
                    $mail->Password = SMTP_PWORD;                     
                    $mail->SMTPSecure = 'ssl';                   
                    $mail->Port = SMTP_PORT;                                 

                    $mail->setFrom(SMTP_UNAME, "DutyWebsite");
                    $mail->addAddress($_SESSION['khEmail'], $_SESSION['khTen']);    
                    $mail->addReplyTo(SMTP_UNAME, 'Tên người trả lời');
//                    $mail->addCC('CCemail@gmail.com');
//                    $mail->addBCC('BCCemail@gmail.com');
                    $mail->isHTML(true);                            
                    $mail->Subject ='Đơn hàng: '.$mahoadon;
                    $mail->Body =$contentemail;
                    $mail->AltBody = $_POST['content'];
                    $result = $mail->send();
                    if (!$result) {
                        $error = "Có lỗi xảy ra trong quá trình gửi mail";
                    }
                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
            
            ?>
            <div class = "container">
                <div class = "error"><?= isset($error) ? $error : "Gửi email thành công" ?></div>
                <a href = "index.php">Quay lại form gửi mail</a>
            </div>
            <?php }?>
           