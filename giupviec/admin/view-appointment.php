<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
    if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    
    $cid=$_GET['viewid'];
      $remark=$_POST['remark'];
      $status=$_POST['status'];
     
    
     
   $query=mysqli_query($con, "update  dondatdichvu set ghichu='$remark',trangthai='$status' where ID='$cid'");
    if ($query) {
    $msg="Đơn đặt đã lưu thành công.";
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
<title>JupViec</title>
<link rel="shortcut icon" type='image/png' href='../images/p.png'>


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">Chi tiết đơn hàng</h3>
					
					
				
					<div class="table-responsive bs-example widget-shadow">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<h4>Thông tin:</h4>
						<?php
$cid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from dondatdichvu where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
						<table class="table table-bordered">
							<tr>
    <th>Mã đơn</th>
    <td><?php  echo $row['madondat'];?></td>
  </tr>
  <tr>
<th>Tên khách hàng</th>
    <td><?php  echo $row['tennd'];?></td>
  </tr>

<tr>
    <th>Email</th>
    <td><?php  echo $row['email'];?></td>
  </tr>
   <tr>
    <th>Số điện thoại</th>
    <td><?php  echo $row['sdt'];?></td>
  </tr>
   <tr>
    <th>Ngày hẹn</th>
    <td><?php  echo $row['ngaydat'];?></td>
  </tr>
 
<tr>
    <th>Thời gian hẹn</th>
    <td><?php  echo $row['thoigian'];?></td>
  </tr>
  
  <tr>
    <th>Tên dịch vụ</th>
    <td><?php  echo $row['tendv'];?></td>
  </tr>
  <tr>
    <th>Ngày thực hiện</th>
    <td><?php  echo $row['ngaythuchien'];?></td>
  </tr>
  

<tr>
    <th>Trạng thái</th>
    <td> <?php  
if($row['trangthai']=="1")
{
  echo "Chấp nhận";
}

if($row['trangthai']=="2")
{
  echo "Từ chối";
}

     ;?></td>
  </tr>
						</table>
						<table class="table table-bordered">
							<?php if($row['ghichu']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 

<tr>
    <th>Ghi chú :</th>
    <td>
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
   </tr>

  <tr>
    <th>Trạng thái :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="1" selected="true">Chấp nhận</option>
     <option value="2">Từ chối</option>
   </select></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-az-primary pd-x-20">Lưu</button></td>
  </tr>
  </form>
<?php } else { ?>
						</table>
						<table class="table table-bordered">
							<tr>
    <th>Ghi chú</th>
    <td><?php echo $row['ghichu']; ?></td>
  </tr>


<tr>
<!-- <th>Remark date</th>
<td><?php echo $row['RemarkDate']; ?>  </td></tr> -->

						</table>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		
        <!--//footer-->
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
<?php }  ?>