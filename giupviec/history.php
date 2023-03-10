<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);

?>
<!DOCTYPE HTML>
<html>
<head>
<title>JupViec | Lịch sử giao dịch</title>
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
	<div class="cardd mb-4">
	<div class="cardd-header">
		<h2>Lịch sử giao dịch</h2>
</div>
	<table class="table table-bordered"> <thead> <tr><th>#</th> <th>Mã đơn</th>  <th>Tên dịch vụ</th> <th>Giá</th> <th>Hình thức thanh toán</th> <th>Tình trạng đơn hàng</th> </tr> </thead> <tbody>
	<?php
$adminid=$_SESSION['bpmsaid'];
$ret=mysqli_query($con,"select * from dondatdichvu where dondatdichvu.ma_kh='$adminid' ORDER BY dondatdichvu.ID DESC");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
             <tr> <th scope="row"><?php echo $cnt;?></th> <td><?php  echo $row['madondat'];?></td><td><?php  echo $row['tendv'];?></td> <td><?php  echo $row['gia'];?></td> <td><?php  echo $row['hinhthucthanhtoan'];?></td>
			 <td>
				<?php if($row['trangthai']==1) {
					echo 'Đơn hàng đã được xác nhận';
				} 
				elseif($row['trangthai']==2) {
					echo 'Đơn hàng bị từ chối';
				} 
				else {
					echo 'Đơn hàng đang chờ xác nhận';
				}
				?>
				<!-- <td><a href="delete-history.php?editid=<?php echo $row['ID'];?>">Edit</a> </td>
				</td> -->
				<?php 
$cnt=$cnt+1;
}?> 
				</tr>

				   </tbody> </table> 
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