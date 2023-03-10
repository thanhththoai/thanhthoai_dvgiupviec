<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
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
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">

		
		 <?php include_once('includes/sidebar.php');?>
		
	<?php include_once('includes/header.php');?>
		<!-- main content start-->
		<div id="page-wrapper" class="row calender widget-shadow">
			<div class="main-page">
				
			
				<div class="row calender widget-shadow">
					<div class="row-one">
					<div class="col-md-4 widget">
						<?php $query1=mysqli_query($con,"Select * from khachhang");
$totalcust=mysqli_num_rows($query1);
?>
						<div class="stats-left ">
							<h5>Tổng</h5>
							<p style="color: white;">Khách hàng</p>
						</div>
						<div class="stats-right">
							<label> <?php echo $totalcust;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-mdl">
						<?php $query2=mysqli_query($con,"Select * from dondatdichvu");
$totalappointment=mysqli_num_rows($query2);
?>
						<div class="stats-left">
							<h5>Tổng</h5>
							<p style="color: white;">Đơn đặt dịch vụ</p>
						</div>
						<div class="stats-right">
							<label> <?php echo $totalappointment;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-last">
						<?php $query3=mysqli_query($con,"Select * from dondatdichvu where trangthai='1'");
$totalaccapt=mysqli_num_rows($query3);
?>
						<div class="stats-left">
							<h5>Tổng</h5>
							<p style="color: white;">Đơn đặt được chấp nhận</p>
						</div>
						<div class="stats-right">
							<label><?php echo $totalaccapt;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="clearfix"> </div>	
				</div>
						
					</div>

				<div class="row calender widget-shadow">
					<div class="row-one">
					<div class="col-md-4 widget">
						<?php $query4=mysqli_query($con,"Select * from dondatdichvu where trangthai='2'");
$totalrejapt=mysqli_num_rows($query4);
?>
						<div class="stats-left ">
							<h5>Tổng</h5>
							<p style="color: white;">Đơn đặt bị từ chối</p>
						</div>
						<div class="stats-right">
							<label> <?php echo $totalrejapt;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-mdl">
						<?php $query5=mysqli_query($con,"Select * from  dichvu");
$totalser=mysqli_num_rows($query5);
?>
						<div class="stats-left">
							<h5>Tổng</h5>
							<p style="color: white;">Dịch vụ</p>
						</div>
						<div class="stats-right">
							<label> <?php echo $totalser;?></label>
							</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-last">
						<?php $query6=mysqli_query($con,"Select * from nhanvien");
$totalaccapt=mysqli_num_rows($query6);
?>
						<div class="stats-left">
							<h5>Tổng</h5>
							<p style="color: white;">Nhân viên</p>
						</div>
						<div class="stats-right">
							<label><?php echo $totalaccapt;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="clearfix"> </div>	
				</div>
						
					</div>

						
					</div>
					 <div class="row calender widget-shadow">			
						<div class="row-one">
					<div class="col-md-4 widget">
						<?php
//Total Sale
 $query9=mysqli_query($con,"select dondatdichvu.ID_dv as ID_dv, dichvu.gia
 from dondatdichvu 
  join dichvu  on dichvu.ID=dondatdichvu.ID_dv");
while($row9=mysqli_fetch_array($query9))
{
$total_sale=$row9['gia'];
$totalsale+=$total_sale;

}
 ?>
						<div class="stats-leftt">
							<h5>Tổng </h5>
							<p style="color:white;">Doanh thu</p>
						</div>
						<div class="stats-rightt">
							<label><?php echo $totalsale;?> VND</label>
							</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="clearfix"> </div>	
				</div>
						
					</div>
</div>
		</div>
		</div> 
		<!--footer-->
		<?php include_once('includes/footer.php');?>
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
	<script type="text/javascript">
		new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'chart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
	</script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>