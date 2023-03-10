<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
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

<div class="cardd mb-4 mb-xl-0">
<?php
$adid=$_SESSION['bpmsaid'];
$ret=mysqli_query($con,"select tennd from khachhang where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['tennd'];

?> 
                <div class="cardd-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="images/avt2.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="titles-avt"><p><?php echo $name; ?></p></div>
                    <!-- Profile picture upload button-->
                </div>
                <hr class="tt-0 qt-4">
                <div class="all-info">
                <div class="myaccount">
                <a href="profiles_customer.php" alt=""><i class="fa-solid fa-user"></i> &emsp; Tài khoản của tôi</a>
                </div>
                <div class="myprofile">
                <a href="profiles_customer.php" alt="">Hồ sơ</a>
                </div>
                <div class="myprofile">
                <a href="history.php" alt="">Lịch sử đơn hàng</a>
                </div>
                <div class="password_customer">
                <a href="change-passwords.php" alt="">Đổi mật khẩu</a>
                </div>
                </div>
</div>
</body>
</html>