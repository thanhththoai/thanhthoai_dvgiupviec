<?php 
include('includes/dbconnection.php');
session_start();
error_reporting(0);
include('includes/dbconnection.php');
require_once('config_vnpay.php');

if(isset($_GET['vnp_Amount'])) {
    $vnp_Amount =$_GET['vnp_Amount'];
    $vnp_BankCode=$_GET['vnp_BankCode'];
    $vnp_OrderInfo=$_GET['vnp_OrderInfo'];
    $vnp_PayDate=$_GET['vnp_PayDate'];
    $vnp_TmnCode=$_GET['vnp_TmnCode'];
    $vnp_TransactionNo=$_GET['vnp_TransactionNo'];
    $vnp_CardType=$_GET['vnp_CardType'];
    $aptnumber =$_SESSION['aptnumber'];
    $query=mysqli_query($con,"insert into vnpay_payment(vnpay_gia,vnpay_nganhang,vnpay_thongtin,vnpay_ngay,vnpay_ma,vnpay_sogiaodich,vnpay_loaithe,madondat) value('$vnp_Amount','$vnp_BankCode','$vnp_OrderInfo','$vnp_PayDate','$vnp_TmnCode','$vnp_TransactionNo','$vnp_CardType','$aptnumber')"); 
    if($query) {
        echo "<script>window.location.href='camon.php'</script>";
    }
    else {
        $msg="Giao dịch thất bại. Vui lòng thử lại";
    }
      
    }
if (strlen($_SESSION['bpmsaid']==0)) {
	header('location:log.php');
	} 
if(isset($_POST['submit']))
  {
    // $eid=$_GET['editid'];
    $ma_kh=$_POST['ma_kh'];
    $tennv=$_POST['tennv'];
    $id_nv=$_POST['id_nv'];
    $ghichu_kh=$_POST['ghichu_kh'];
    $id_dv=$_POST['id_dv'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $diachi=$_POST['diachi'];
    $services=$_POST['services'];
    $adate=$_POST['adate'];
    $gia=$_POST['gia'];
	$tongtien=$_POST['tongtien'];
	$sogio=$_POST['sogio'];
    $atime=$_POST['atime'];
    $phone=$_POST['phone'];
	$payment=$_POST['payment'];
  $eid=$_GET['editid'];
    $aptnumber = mt_rand(100000000, 999999999);
    $query=mysqli_query($con,"insert into dondatdichvu(madondat,tennd,email,diachi,sdt,ngaydat,thoigian,tendv,gia,hinhthucthanhtoan,tennv,ma_kh,ID_dv,ghichu_kh) value('$aptnumber','$name','$email','$diachi','$phone','$adate','$atime','$services','$gia','$payment','$tennv','$ma_kh','$id_dv','$ghichu_kh')");
    if ($query) {
$ret=mysqli_query($con,"select madondat from dondatdichvu where email='$email' and  sdt='$phone'");
$result=mysqli_fetch_array($ret);
$_SESSION['aptno']=$result['madondat'];

  }
  if ($payment == 'tien mat')
  {
	  echo "<script>window.location.href='thank-you.php'</script>";
  }
  if ($payment == 'vnpay')
    {
		$vnp_TxnRef =$aptnumber; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = 'Thanh toán dịch vụ tại JupViec';
$vnp_OrderType = 'billpayment';
$vnp_Amount = str_replace(',', '', $_POST['gia']) * 100;
$vnp_Locale = 'vn';
$vnp_BankCode = 'NCB';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
$vnp_ExpireDate = $expire;
//Billing
// $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
// $vnp_Bill_Email = $_POST['txt_billing_email'];
// $fullName = trim($_POST['txt_billing_fullname']);
// if (isset($fullName) && trim($fullName) != '') {
//     $name = explode(' ', $fullName);
//     $vnp_Bill_FirstName = array_shift($name);
//     $vnp_Bill_LastName = array_pop($name);
// }
// $vnp_Bill_Address=$_POST['txt_inv_addr1'];
// $vnp_Bill_City=$_POST['txt_bill_city'];
// $vnp_Bill_Country=$_POST['txt_bill_country'];
// $vnp_Bill_State=$_POST['txt_bill_state'];
// // Invoice
// $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
// $vnp_Inv_Email=$_POST['txt_inv_email'];
// $vnp_Inv_Customer=$_POST['txt_inv_customer'];
// $vnp_Inv_Address=$_POST['txt_inv_addr1'];
// $vnp_Inv_Company=$_POST['txt_inv_company'];
// $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
// $vnp_Inv_Type=$_POST['cbo_inv_type'];
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_ExpireDate"=>$vnp_ExpireDate
    // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
    // "vnp_Bill_Email"=>$vnp_Bill_Email,
    // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
    // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
    // "vnp_Bill_Address"=>$vnp_Bill_Address,
    // "vnp_Bill_City"=>$vnp_Bill_City,
    // "vnp_Bill_Country"=>$vnp_Bill_Country,
    // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
    // "vnp_Inv_Email"=>$vnp_Inv_Email,
    // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
    // "vnp_Inv_Address"=>$vnp_Inv_Address,
    // "vnp_Inv_Company"=>$vnp_Inv_Company,
    // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
    // "vnp_Inv_Type"=>$vnp_Inv_Type
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
// if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
//     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
// }

//var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['submit'])) {
		$_SESSION['aptnumber']=$aptnumber;
    //  $query=mysqli_query($con,"insert into dondatdichvu(madondat,tennd,email,diachi,sdt,ngaydat,thoigian,tendv,gia,hinhthucthanhtoan,tennv,ma_kh,ID_dv,ghichu_kh) value('$aptnumber','$name','$email','$diachi','$phone','$adate','$atime','$services','$gia','$payment','$tennv','$ma_kh','$id_dv','$ghichu_kh')");
		if ($query) {
	$ret=mysqli_query($con,"select madondat from dondatdichvu where email='$email' and  sdt='$phone'");
	$result=mysqli_fetch_array($ret);
	$_SESSION['aptno']=$result['madondat'];
		}
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }

    }

else {
	$msg="Xảy ra lỗi. Vui lòng thử lại!";
}
  
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JupViec | Đặt dịch vụ</title>
    <link rel="shortcut icon" type="image/png" href="images/p.png">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <?php include_once('includes/header.php');?>
  <section class="ftco-section ftco-no-pt ftco-booking">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters d-md-flex justify-content-end">
    			<div class="one-forth d-flex align-items-end">
    				<div class="text">
    					<!-- <div class="overlay"></div> -->
    					<div class="appointment-wrap">
    						<!-- <span class="subheading">Reservation</span> -->
								<h3 class="mb-2">Đặt dịch vụ</h3>
		    				<form action="#" method="post" class="appointment-form" autocomplete="off">
			            <div class="row">
                        <?php
$adminid=$_SESSION['bpmsaid'];
$ret=mysqli_query($con,"select * from khachhang where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    	<div class="col-sm-12">
			                <div class="form-group" style="display:none">
		                  <input type="text" class="form-control" id="ma_kh" name="ma_kh"  value="<?php echo $row['ID'];?>" >
					            </div>
                      </div>
			              <div class="col-sm-12">
			                <div class="form-group">
							<label for="exampleInputEmail12" style="display:flex; color:#EAA023">Tên tài khoản:</label>
		                        <input type="text" class="form-control" id="name" required="true" placeholder="ten" name="name"  value="<?php echo $row['tennd'];?>" >
		                       
					              <!-- <input type="text" class="form-control" id="name" placeholder="ten" name="name" required="true"> -->
					            </div>
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
							<label for="exampleInputEmail12" style="display:flex; color:#EAA023">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="ten" name="email" required="true" value="<?php echo $row['email'];?>" >
		                       
                               <!-- <input type="text" class="form-control" id="name" placeholder="ten" name="name" required="true"> -->
                             </div>
			              </div>
                          <div class="col-sm-12">
			                <div class="form-group">
							<label for="exampleInputEmail12" style="display:flex; color:#EAA023">Số điện thoại:</label>
                            <input type="text" class="form-control" id="phone" placeholder="ten" name="phone" required="true" value="<?php echo $row['sdt'];?>" >
		                       
                               <!-- <input type="text" class="form-control" id="name" placeholder="ten" name="name" required="true"> -->
                             </div>
			              </div>
                          <div class="col-sm-12">
			                <div class="form-group">
							<label for="exampleInputEmail12" style="display:flex; color:#EAA023">Địa chỉ:</label>
                            <input type="text" class="form-control" id="diachi" placeholder="ten" name="diachi" required="true" value="<?php echo $row['diachi'];?>" >
		                       
                               <!-- <input type="text" class="form-control" id="name" placeholder="ten" name="name" required="true"> -->
                             </div>
			              </div>
                          <?php } ?> 

						  <?php
$cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from dichvu where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    	<div class="col-sm-12">
			                <div class="form-group" style="display:none">
		                  <input type="text" class="form-control" id="id_dv" name="id_dv"  value="<?php echo $row['ID'];?>" >
					            </div>
                      </div>
			              <div class="col-sm-12">
			                <div class="form-group">
							<label for="exampleInputEmail12" style="display:flex; color:#EAA023">Tên dịch vụ:</label>
                            <input type="text" readonly class="form-control" id="services" placeholder="ten" name="services" required="true" value="<?php echo $row['tendv'];?>" >
			                </div>    
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
							<label for="exampleInputEmail12" style="display:flex; color:#EAA023">Giá dịch vụ:</label>
                            <input type="text" readonly class="form-control" id="gia" placeholder="ten" name="gia" required="true" value="<?php echo $row['gia'];?>">
			                </div>
			              </div>
						  
                          <?php } ?> 
			              <!-- <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required="true" maxlength="10" pattern="[0-9]+">
			                </div>
			              </div> -->
                    <div class="col-sm-12">
			                <div class="form-group">
					              <div class="select-wrap">
		                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                      <select name="tennv" id="tennv" class="form-control">
		                      	<option value="">Chọn nhân viên</option>
		                      	<?php $query=mysqli_query($con,"select * from nhanvien");
              while($row=mysqli_fetch_array($query))
              {
              ?>
		                       <option value="<?php echo $row['tennv'];?>"><?php echo $row['tennv'];?></option>
		                       <?php } ?> 
		                      </select>
		                    </div>
					            </div>
			              </div>

                      <div class="col-sm-12">
			                <div class="form-group">
                      <label for="exampleInputEmail12" style="display:flex; color:#EAA023">Ghi chú của khách hàng:</label>
                      <textarea rows="4" cols="50"  id="ghichu_kh" placeholder="Ghi chú" name="ghichu_kh"  value="<?php echo $row['ghichu_kh'];?>" ></textarea>
			                </div>    
			              </div>
                          <div class="col-sm-12">
			                <div class="form-group" >
							
			                  <input type="text" class="form-control appointment_date" placeholder="Ngày" name="adate" id='adate' required="true">
			                </div>    
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control appointment_time" placeholder="Thời gian" name="atime" id='atime' required="true">
			                </div>
			              </div>
				          </div>
						  <div class="biiling">
								<p> Hình thức thanh toán </p>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="payment" id="payment" value="tien mat" >
									<lable class="form-check-lable" for="exampleRadios2">
										Tiền mặt 
									</lable>
								</div>
								<!-- <div class="form-check">
									<input class="form-check-input" type="radio" name="payment"  value="momo" >
									<img src="images/momo.png" height="30" width="30">
									<lable class="form-check-lable" for="exampleRadios2">
										Momo 
									</lable>
								</div> -->
								<div class="form-check">
									<input class="form-check-input" type="radio" name="payment"  value="vnpay" >
									<img src="images/vnp.png" height="30" width="30">
									<lable class="form-check-lable" for="exampleRadios2">
										VNPAY 
									</lable>
								</div>

						  </div>
				          <div class="form-group">
			              <input type="submit" name="submit"  value="Thanh Toán" class="btn btn-primary">
			            </div>
			          </form>
		          </div>
						</div>
    			</div>
					<!-- <div class="one-third">
						<div class="img" >
						</div>
					</div> -->
    		</div>
    	</div>
    </section>
    <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>
  
</body>
</html>