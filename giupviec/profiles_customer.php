<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:log.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['bpmsaid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  $diachi=$_POST['diachi'];
  $email=$_POST['email'];
  $gioitinh=$_POST['gioitinh'];
  // $eid=$_GET['editid'];
  
     $query=mysqli_query($con, "update khachhang set  tennd='$aname', sdt='$mobno', diachi='$diachi', email='$email',gioitinh='$gioitinh' where ID='$adminid'");
    if ($query) {
    $msg="Cập nhật tài khoản thành công";
  }
  else
    {
      $msg="Xảy ra lỗi. Vui lòng thử lại.";
    }
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>JupViec | Hồ sơ</title>
    <link rel="shortcut icon" type="image/png" href="images/p.png">
<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"> -->
<!-- <link href="admin/css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
<!-- Custom CSS -->
<link href="admin/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<!-- <link href="admin/css/animate.css" rel="stylesheet" type="text/css" media="all"> -->
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<link href="css/style.css" rel='stylesheet' type='text/css' />
</head> 
<body >
<?php include_once('includes/header.php');?>
<div class="container">
    <!-- Account page navigation-->
    <div class="row">
    <div class="col-xl-4">
    <?php include_once('includes/sidebar.php');?>
    </div>
        <div class="col-xl-8">
            <!-- Account details cardd-->
            <div class="cardd mb-4">
                <div class="cardd-header"><h1>Hồ Sơ Cá Nhân</h1>
            <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p></div>
						<div class="form-body">
							<form method="post">
								<p style="font-size:16px; color:#EAA023" align-items="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php
$adminid=$_SESSION['bpmsaid'];
$ret=mysqli_query($con,"select * from khachhang where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

							 <div class="form-groups"> <label for="exampleInputEmail1">Tên tài khoản</label> <input type="text" class="form-controls" id="adminname" name="adminname" placeholder="Admin Name" value="<?php  echo $row['tennd'];?>"> </div> 
                             <div class="form-groups"> <label for="exampleInputPassword1">Địa Chỉ</label> <input type="text" id="diachi" name="diachi" class="form-controls" value="<?php  echo $row['diachi'];?>"> </div>
							 <div class="form-groups"> <label for="exampleInputPassword1">Số điện thoại</label> <input type="text" id="contactnumber" name="contactnumber" class="form-controls" value="<?php  echo $row['sdt'];?>"> </div>
							 <div class="form-groups"> <label for="exampleInputPassword1">Email</label> <input type="email" id="email" name="email" class="form-controls" value="<?php  echo $row['email'];?>" > </div>
                             <div class="form-groupp"> <label for="exampleInputPassword1">Giới tính  &emsp;   </label> 
							 <?php if($row['gioitinh']=="Nam")
{?><input type="radio" id="gioitinh" name="gioitinh" value="Nam" checked="true">Nam &emsp;

                     <input type="radio" name="gioitinh" value="Nu"> Nữ &emsp;
                   <?php } 
else 
{?><input type="radio" id="gioitinh" name="gioitinh" value="Nam" >Nam &emsp;

                     <input type="radio" name="gioitinh" value="Nu" checked="true">Nữ &emsp;
                   <?php } ?>
</div>
				   
<button type="submit" name="submit" class="btnn-secondary">Lưu thông tin</button>  
                            </form> 
						</div>
						<?php } ?>
					</div>
				
				
			</div>
		</div>
	</div>
<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>
<?php }  ?>