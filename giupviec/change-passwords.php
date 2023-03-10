<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:log.php');
  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['bpmsaid'];
$cpassword=($_POST['currentpassword']);
$newpassword=($_POST['newpassword']);
$query=mysqli_query($con,"select ID from khachhang where ID='$adminid' and   password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update khachhang set password='$newpassword' where ID='$adminid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JupViec | Đổi mật khẩu</title>
    <link rel="shortcut icon" type="image/png" href="images/p.png">

<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
<!-- Bootstrap Core CSS -->
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
<!-- <link href="css/animate.css" rel="stylesheet" type="text/css" media="all"> -->
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--//Metis Menu -->
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>
<body>
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
                <div class="cardd-header"><h1>Đổi mật khẩu</h1>
            <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p></div>
						<div class="form-body">
							<form method="post" name="changepassword" onsubmit="return checkpass();" action="">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php
$adminid=$_SESSION['bpmsaid'];
$ret=mysqli_query($con,"select * from khachhang where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
							  <div class="form-groups"> <label for="exampleInputEmail1">Mật khẩu hiện tại</label> <input type="password" name="currentpassword" class="form-controls" required= "true" value=""> </div> 
							  <div class="form-groups"> <label for="exampleInputPassword1">Mật khẩu mới</label> <input type="password" name="newpassword" class="form-controls" value="" required="true"> </div>
								<div class="form-groups"> <label for="exampleInputPassword1">Xác nhận mật khẩu</label> <input type="password" name="confirmpassword" class="form-controls" value="" required="true"> </div>
							  	<div class="forgot-pass">						
									<a href="forgot-password.php" alt="">Quên mật khẩu?</a>
								</div>	
							  <button type="submit" name="submit" class="btnn-secondary">Xác nhận</button> </form> 
						</div>
						<?php } ?>
					</div>
				
				
			</div>
		</div>
	</div>
	<!-- Classie -->
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
<?php } ?>