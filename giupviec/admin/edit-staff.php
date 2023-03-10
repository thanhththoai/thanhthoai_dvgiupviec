<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else {

if(isset($_POST['submit']))
  {
    $manv=$_POST['manv'];
    $name=$_POST['name'];
    $sdt=$_POST['sdt'];
    $namsinh=$_POST['namsinh'];
    $kinhnghiem=$_POST['kinhnghiem'];
    $chitiet=$_POST['chitiet'];
    if(isset($_FILES['avt'])){
        $file=$_FILES['avt'];
        $file_name=$file['name'];
        move_uploaded_file($file['tmp_name'],'uploads/'.$file_name);
    }
 $eid=$_GET['editid'];
     
    $query=mysqli_query($con, "update  nhanvien set manv='$manv',tennv='$name',sdt='$sdt',namsinh='$namsinh',kinhnghiem='$kinhnghiem',chitiet='$chitiet',avt='$file_name' where ID='$eid' ");
    if ($query) {
    $msg="Thông tin được lưu thành công.";
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
				<div class="forms">
					<h3 class="title1">Thông tin nhân viên</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4></h4>
						</div>
						<div class="form-body">
							<form method="POST" enctype="multipart/form-data">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from nhanvien where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 

                            <div class="form-group"> <label for="exampleInputEmail1">Mã nhân viên</label> <input type="text" class="form-control" id="manv" name="manv"  value="<?php  echo $row['manv'];?>" required="true"> </div> 
							 <div class="form-group"> <label for="exampleInputEmail1">Tên nhân viên</label> <input type="text" class="form-control" id="name" name="name"  value="<?php  echo $row['tennv'];?>" required="true"> </div> 
                             <div class="form-group"> <label for="exampleInputPassword1">Năm sinh</label> <input type="text" id="namsinh" name="namsinh" class="form-control"  value="<?php  echo $row['namsinh'];?>" required="true"> </div>
                             <div class="form-group"> <label for="exampleInputPassword1">Hình ảnh</label> 
                             <img src="uploads/<?php echo $row['avt'] ?>" style="width: 300px;" alt="">
                             <input type="file" id="avt" name="avt"> </div>
							 <div class="form-group"> <label for="exampleInputPassword1">Số điện thoại</label> <input type="text" id="sdt" name="sdt" class="form-control"  value="<?php  echo $row['sdt'];?>" required="true"> </div>
							 <div class="form-group"> <label for="exampleInputPassword1">Kinh nghiệm</label> <input type="text" id="kinhnghiem" name="kinhnghiem" class="form-control"  value="<?php  echo $row['kinhnghiem'];?>" required="true"> </div>
                             <div class="form-group"> <label for="exampleInputPassword1">Chi tiết</label> <input type="text" id="chitiet" name="chitiet" class="form-control"  value="<?php  echo $row['chitiet'];?>" required="true"> </div>
                             <?php } ?>
				   <div>
							  <button type="submit" name="submit" class="btn btn-default">Lưu</button> 
</div</form> 
						</div>
						
					</div>
				
	
			</div>
		</div>
		 <?php include_once('includes/footer.php');?>
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