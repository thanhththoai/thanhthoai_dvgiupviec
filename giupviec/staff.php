
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');



  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>BPMS-Services</title>
    
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
    <section class="staff" >
    <div class="container" style="padding: 70px">
        <div class="row">
        <div class="section-title">
			<h2> Danh sách nhân viên </h2>
		</div>
        </div>
        <?php
$ret=mysqli_query($con,"select *from  nhanvien");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
        <div class="row">
            <div class="staff-items">
                <div class="staff-item">
                    <img src="admin/uploads/<?php echo $row['avt'] ?>" alt="">
                </div>
                <div class="staff-detail">
                   <table>
                   <tr>
                        <td style="width:150px">Tên nhân viên</td>
                        <td style="color: black">
                        <?php  echo $row['tennv'];?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:150px">Năm sinh</td>
                        <td style="color: black">
                        <?php  echo $row['namsinh'];?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:150px">Số điện thoại</td>
                        <td style="color: black">
                        <?php  echo $row['sdt'];?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:150px">Kinh nghiệm</td>
                        <td style="color: black">
                        <?php  echo $row['kinhnghiem'];?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:150px">Chi tiết</td>
                        <td style="width:640px;color:black">
                        <?php  echo $row['chitiet'];?>
                        </td>
                    </tr>
                   </table>
                </div>
            </div>
        </div>
        <hr class="tt-0 qt-5">
        <?php
    } ?>
    </div>
    </section>


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