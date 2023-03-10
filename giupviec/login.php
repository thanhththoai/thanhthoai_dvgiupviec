<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
    //Validate email 
	?>
<!DOCTYPE HTML>
<html>
<head>
<title>JupViec | Đăng kí</title>
    <link rel="shortcut icon" type="image/png" href="images/p.png">
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"> -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="admin/css/style.css" rel='stylesheet' type='text/css' />
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
<!-- <script type="text/javascript">
function checkpass()
{
if(document.changepassword.password.value!=document.changepassword.confirmpassword.value)
{
alert('Mật khẩu nhập không đúng. Vui lòng thử lại!');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script> -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<!-- <?php 
$emailErr = "";
$sdtErr = "";
$email = "";
$sdt = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
	//Validate chuỗi 
	 
		//Validate email 
		if (empty($_POST["email"])) {
			$emailErr = "Email là trường bắt buộc.";
		} else {
			$email = input_data($_POST["email"]);
			// Kiểm tra email có đúng định dạng hay không 
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Email không đúng định dạng.";
			}
		}
	 
		//Validate số 
		if (empty($_POST["sdt"])) {
			$sdtErr = "Số điện thoại là bắt buộc.";
		} else {
			$sdt = input_data($_POST["sdt"]);
			// Kiểm tra xem số điện thoại đã đúng định dạng hay chưa 
			if (!preg_match ("/^[0-9-+]+$/", $sdt) ) {
				$sdtErr = "Bạn chỉ được nhập giá trị số.";
			}
			//Kiểm tra độ dài của số điện thoại 
			if (strlen ($sdt) != 10) {
				$sdtErr = "Số điện thoại phải là 10 ký tự.";
			}
		}
	}
	function input_data($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?> -->
		<!-- main content start-->
		<div id="page-wrappers">
			<div class="main-page login-page ">
				<h3 class="title1">Đăng ký tài khoản</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Chào mừng đến với JupViec </h4>
					</div>
				
					<div class="login-body">
						<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
							<p style="font-size:16px; color:red" align-items="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>


							<input type="text" class="user" name="username" placeholder="Tên tài khoản" required="true">
							<!-- <span class="error">* <?php echo $nameErr; ?> </span> -->
                            <input type="text" class="email" name="email" placeholder="Email"  >
							<span class="error" style="color:red;"><?php echo $emailErr; ?> </span>
                            <input type="text" class="sdt" name="sdt" placeholder="Số điện thoại">
							<span class="error" style="color:red;"><?php echo $sdtErr; ?> </span>
							<input type="password" name="password" class="lock" placeholder="Mật khẩu" required="true">
                            <input type="password" name="confirmpassword" class="lock" placeholder="Xác nhận mật khẩu" required="true">
							<input type="submit" name="submit" value="Đăng ký">
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="customer.php">Bạn đã có tài khoản ? <p style="color:red">Đăng nhập </p></a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
				
				
			</div>
		</div>
	<?php
	if(isset($_POST['submit']))
	{
	  if($emailErr == "" && $sdtErr == "") {
	  $username=$_POST['username'];
	  $email=$_POST['email'];
	  $sdt=$_POST['sdt'];
	  $password=($_POST['password']);
	  $confirmpassword=($_POST['confirmpassword']);
	  $rest=mysqli_query($con,"select ID from khachhang where  tennd='$username' ");
  //     $sql = "SELECT * FROM khachhang WHERE tennd = '$username'";
	  $result = mysqli_fetch_array($rest);
  // // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
//   if ($_SERVER["REQUEST_METHOD"] == "POST") {  
// 	  echo "Dữ liệu được gửi bằng phương thức POST.";  
//   }  
	  if ($password != $confirmpassword) {
		  echo '<script language="javascript">alert("Nhập mật khẩu không chính xác!"); window.location="login.php";</script>';
		  // header('location:login.php');
		  die ();
	  }
	  if ($result > 0)
	  {
		  echo '<script language="javascript">alert("Tên tài khoản đã tồn tại!"); window.location="login.php";</script>';
		  // header('location:login.php');
		  
		  die ();
	  }
	  else {
  
	  // $query=mysqli_query($con,"select ID from khachhang where  tennd='$username' ");
	  // $old=mysqli_num_rows($query);
	  // if($old < 0 ) {
	  //     $msg="Tài khoản đã tồn tại. Vui lòng thử lại!";
	  // }
	  // $sql="INSERT INTO khachhang (tennd,password)  VALUES ('$username','$password') ";
	  // mysqli_query($con,$sql);
	  // else {
		  $query=mysqli_query($con,"insert into khachhang(tennd,email,sdt,password) values('$username','$email','$sdt','$password')");
	  
	  // $ret=mysqli_fetch_array($query);
	  if($query){
	  //   $_SESSION['bpmsaid']=$ret['ID'];
	   header('location:index.php');
	  }
  }
	  }
	  else{
	  $msg="Invalid Details.";
	  }	
	}
	?>
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

</body>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>