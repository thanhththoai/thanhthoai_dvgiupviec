<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);

    // $iduser=$_POST['username'];
    // $password=($_POST['password']);
    // $query=mysqli_query($con,"select ID from khachhang where  tennd='$iuser' && password='$password' ");
    // $ret=mysqli_fetch_array($query);
    // if($ret>0){
    //   $_SESSION['dnhap']=$ret['tennd'];
    //  header('location:index.php');
    // }
    // else{
    // $msg="Invalid Details.";
    // }	
  ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  
  <meta charset="UTF-8">
  <title>CodePen - Drop-Down Menu</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fontawesome.com/v5/search?q=user&m=free">
  <link rel="stylesheet" type="text/css" href="fonts/icon/css/all.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="./style.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <div class="header-logo">
        
        <div class="background-images">
        <img src="images/logo1.png" alt="">
        <a class="navbar-brand" href="index.php">Giúp Việc Nhà</a>
        </div>
        </div>
        <?php
        if(isset($_SESSION['bpmsaid'])) {
          $adid=$_SESSION['bpmsaid'];
          $ret=mysqli_query($con,"select tennd from khachhang where ID='$adid'");
          $row=mysqli_fetch_array($ret);
          $name=$row['tennd'];
          
          ?> 
          <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item "><a href="index.php" class="nav-link">Trang chủ</a></li>
            <li class="nav-item "><a href="staff.php" class="nav-link">Nhân viên</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Dịch vụ <i class="fa fa-chevron-down"></i></a>
                <span class="accent"></span>
                <ul class="drop-down">
                  <li><a href="dvtheogio.php">Giúp việc theo giờ </a></li>
                  <li><a href="serhome.php">Dịch vụ vệ sinh nhà</a></li>
                  <li><a href="service-young.php">Giúp việc trông trẻ</a></li>
                  <li><a href="service-oldman.php">Chăm sóc người già</a></li>
                  <li><a href="service-amini.php">Dịch vụ tổng vệ sinh</a></li>
                </ul>
              </li>
              <li class="nav-item "><a href="services.php" class="nav-link">Bảng giá</a></li>
            <!-- <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li> -->
            <!-- <li class="nav-item"><a href="about.php" class="nav-link">About</a></li> -->
              <li class="nav-item"><a href="#" class="nav-link"><?php echo $name; ?><i class="fa fa-chevron-down"></i> </a>
                  <span class="accent"></span>
                  <ul class="drop-downs">
                    <li><i class="fa-solid fa-gear"></i><a href="profiles_customer.php">   Tài khoản</a> </li>
                  <li><i class="fa-solid fa-right-from-bracket"></i><a href="log.php">  Đăng xuất </a></li>
                  </ul>
              </li>
            
          </ul>
          </div>
          <?php
        }
        else {
          ?>
          <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item "><a href="index.php" class="nav-link">Trang chủ</a></li>
            <li class="nav-item "><a href="staff.php" class="nav-link">Nhân viên</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Dịch vụ <i class="fa fa-chevron-down"></i></a>
                <span class="accent"></span>
                <ul class="drop-down">
                  <li><a href="dvtheogio.php">Giúp việc theo giờ </a></li>
                  <li><a href="serhome.php">Dịch vụ vệ sinh nhà</a></li>
                  <li><a href="service-young.php">Giúp việc trông trẻ</a></li>
                  <li><a href="service-oldman.php">Chăm sóc người già</a></li>
                  <li><a href="service-amini.php">Dịch vụ tổng vệ sinh</a></li>
                </ul>
              </li>
              <li class="nav-item "><a href="services.php" class="nav-link">Bảng giá</a></li>
            <!-- <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li> -->
            <!-- <li class="nav-item"><a href="about.php" class="nav-link">About</a></li> -->
            <li class="nav-item"><a href="#" class="nav-link">Đăng nhập <i class="fa fa-chevron-down"></i></a>
                <span class="accent"></span>
                <ul class="drop-downs">
                  <li><a href="customer.php">Khách hàng </a></li>
                  <li><a href="admin/index.php">Admin</a></li>
                </ul>
              </li>
          </ul>
          </div>
          <?php
        }
        ?>
          
      </div>
    </nav>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/drop-downs.js"></script>

</body>
</html>
