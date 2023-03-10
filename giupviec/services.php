<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submitt']))
{
  $tendv=$_POST['tendv'];
  // $madv=$_POST['madv'];
  $chitiet=$_POST['chitiet'];
  $gia=$_POST['gia'];
  $query=mysqli_query($con,"select ID from dichvu where  tendv='$tendv'");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['bpmsaid']=$ret['ID'];
     header('location:order.php');
    }
    else{
    $msg="Invalid Details.";
    }	
}

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>JupViec | Bảng giá</title>
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
    <section class="ftco-section ftco-pricing">
			<div class="container">
				<div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<h1 class="big">Pricing</h1>
          	<h3 class="subheadingg">Bảng giá</h3>
            <h2 class="big">Dịch vụ của chúng tôi</h2>
            <p>Đến với JupViec, quý khách sẽ có được sự đảm bảo về dịch vụ, đảm bảo về yếu tố con người cũng như chi phí. Bất cứ khi nào có nhu cầu tìm người giúp việc, hãy liên hệ nay với chúng tôi để được tư vấn miễn phí, không mất nhiều thời gian tìm kiếm. JupViec đáp ứng mọi nhu cầu về giúp việc nhà, giúp việc chăm bé, chăm sóc ông bà, phục vụ nhà hàng hay là các dịch vụ như giúp việc theo giờ hành chính hay giúp việc ăn ở lại...

Chúng tôi cam kết sẽ mang tới cho khách hàng trải nghiệm tốt nhất và hy vọng vào sự hợp tác lâu dài trong tương lai. Giúp việc Giúp Việc luôn lắng nghe mọi ý kiến đóng góp và không ngừng hoàn thiện dịch vụ của mình nhằm mang tới những giá trị và lợi ích tốt nhất cho khách hàng!</p>
          </div>
        </div>
        
        <!-- <form method="POST" action="order.php?tendv=<?php echo $row['tendv'] ?>"> -->
            <table class="table table-bordered"> <thead> <tr><th>#</th> <th>Tên dịch vụ</th>  <th>Chi tiết dịch vụ</th> <th>Giá</th> <th></th> </tr> </thead> <tbody>
<?php
$ret=mysqli_query($con,"select *from  dichvu");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

             <tr> <th scope="row"><?php echo $cnt;?></th> <td><?php  echo $row['tendv'];?></td><td><?php  echo $row['chitiet'];?></td> <td><?php  echo $row['gia'];?></td> 	<td><a class="btn" name ="submit" href="order.php?editid=<?php
                           
             echo $row['ID'];?>">Đặt Dịch Vụ</a></td> </tr>   <?php 
$cnt=$cnt+1;
}?></tbody> </table> 
<!-- </form> -->
</div>
		</section>
    <hr class="tt-01 qt-04">
    <?php include_once('comments.php');?>
    <?php include_once('includes/footer.php');?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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