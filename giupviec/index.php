<?php 
include('includes/dbconnection.php');
session_start();
error_reporting(0);
include('includes/dbconnection.php');
// if (strlen($_SESSION['bpmsaid']==0)) {
// 	header('location:logout.php');
// 	} 
// if(isset($_POST['submit']))
//   {

//     $name=$_POST['name'];
//     $email=$_POST['email'];
//     $services=$_POST['services'];
//     $adate=$_POST['adate'];
//     $atime=$_POST['atime'];
//     $phone=$_POST['phone'];
//     $aptnumber = mt_rand(100000000, 999999999);
  
//     $query=mysqli_query($con,"insert into lichhen(malichhen,ten,email,sdt,ngayhen,thoigian,dichvu) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
//     if ($query) {
// $ret=mysqli_query($con,"select malichhen from lichhen where email='$email' and  sdt='$phone'");
// $result=mysqli_fetch_array($ret);
// $_SESSION['aptno']=$result['malichhen'];
//  echo "<script>window.location.href='thank-you.php'</script>";	
//   }
//   else
//     {
//       $msg="Something Went Wrong. Please try again";
//     }

  
// }

// ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JupViec | Trang chủ</title>
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
    <!-- END nav -->

    <section id="home-section" class="hero" style="background-image: url(images/13.jpg);" data-stellar-background-ratio="0.5">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
	          	<!-- <img class="one-third align-self-end order-md-last img-fluid" src="images/bg_1.png" alt=""> -->
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text mt-5">
		          		<span class="subheading">JupViec</span>
			            <h1 class="mb-4">Chuyên nghiệp - Tận tâm</h1>
			            <p class="mb-4">Đội ngũ Tư vấn viên & Chăm sóc Khách hàng kinh nghiệm, chuyên nghiệp, tận tâm. JupViec cam kết bảo hành dịch vụ khi Khách hàng chưa hài lòng.</p>
			            
			           
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          	<!-- <img class="one-third align-self-end order-md-last img-fluid" src="images/bggv2.jpg" alt=""> -->
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text mt-5">
		          		<span class="subheading">Jupviec</span>
			            <h1 class="mb-4">Người giúp việc nhà tiêu chuẩn</h1>
			            <p class="mb-4">Người giúp việc nhà tiêu chuẩn, đáng tin cậy, có đầy đủ hồ sơ. Công ty JupViec chịu trách nhiệm tuyển chọn, đào tạo và quản lý.</p>
			            
			           
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>


<br>
    <!-- <section class="ftco-section ftco-no-pt ftco-booking">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters d-md-flex justify-content-end">
    			<div class="one-forth d-flex align-items-end">
    				<div class="text">
    					<div class="overlay"></div>
    					<div class="appointment-wrap">
    						<span class="subheading">Reservation</span>
								<h3 class="mb-2">Make an Appointment</h3>
		    				<form action="#" method="post" class="appointment-form">
			            <div class="row">
			              <div class="col-sm-12">
			                <div class="form-group">
					              <input type="text" class="form-control" id="name" placeholder="ten" name="name" required="true">
					            </div>
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
					              <input type="email" class="form-control" id="appointment_email" placeholder="email" name="email" required="true">
					            </div>
			              </div>
				            <div class="col-sm-12">
			                <div class="form-group">
					              <div class="select-wrap">
		                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                      <select name="services" id="services" required="true" class="form-control">
		                      	<option value="">Select Services</option>
		                      	<?php $query=mysqli_query($con,"select * from dichvu");
              while($row=mysqli_fetch_array($query))
              {
              ?>
		                       <option value="<?php echo $row['tendv'];?>"><?php echo $row['tendv'];?></option>
		                       <?php } ?> 
		                      </select>
		                    </div>
					            </div>
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control appointment_date" placeholder="Date" name="adate" id='adate' required="true">
			                </div>    
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control appointment_time" placeholder="Time" name="atime" id='atime' required="true">
			                </div>
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required="true" maxlength="10" pattern="[0-9]+">
			                </div>
			              </div>
				          </div>
				          <div class="form-group">
			              <input type="submit" name="submit" value="Make an Appointment" class="btn btn-primary">
			            </div>
			          </form>
		          </div>
						</div>
    			</div>
					<div class="one-third">
						<div class="img" style="background-image: url(images/bg-1.jpg);">
						</div>
					</div>
    		</div>
    	</div>
    </section> -->
	<section class="about section-padding" style="background-image: url(images/bg1.png);">
			<div class="container">
				<div class="ro">
					<div class="section-title">
						<h2> Về Chúng Tôi </h2>
					</div>
				</div>
				<div class="ro">
					<div class="about-items">
					<div class="about-item">
						<h2>Chào mừng các bạn đến với JupViec</h2>
						<p> Tìm Người giúp việc nhà nhanh chóng qua vài thao tác. Ứng dụng cung cấp đầy đủ thông tin về dịch vụ và Người giúp việc, tiện lợi trong việc chủ động lựa chọn và đánh giá </p>
						<a class="btnn" name ="submit" href="services.php">Đặt Dịch Vụ Ngay</a>
			  		</div>			
					<div class="about-item">
						<div class="about-item-img">
							<span>Đáng tin cậy</span>
						<img src="images/bg--2.png" alt="" >
						</div>
					</div>
					</div>
				</div>
				
			</div>
	</section>
	<section class="dichvu section-padding" >
		<div class="container">
			<div class="ro">
				<div class="section-content">
					<h2> Dịch vụ của chúng tôi </h2>
				</div>
			</div>
			<div class="ro">
				<div class="dichvu-wrap">
					<div class="dichvu-items">
						<div class="dichvu-item">
							<div class="dichvu-img">
								<img src="images/gv1.png" alt="">
							</div>
							<div class="dichvu-title">
								<h2> Giúp việc theo giờ</h2>
								<p> Giúp việc nhà theo giờ làm theo khung giờ Khách hàng đăng ký khi phát sinh nhu cầu. Công việc gồm: Dọn nhà, nấu ăn, rửa bát và hỗ trợ chăm sóc trẻ.</p>
							</div>
							<a class="btnn-secondary" name ="submit" href="services.php">Đặt Dịch Vụ Ngay</a>

						</div>
					</div>
			
					<div class="dichvu-items">
						<div class="dichvu-item">
							<div class="dichvu-img">
								<img src="images/gv3.png" alt="">
							</div>
							<div class="dichvu-title">
								<h2> Dịch vụ vệ sinh nhà</h2>
								<p> Trải nghiệm ngay tại JupViec - dịch vụ vệ sinh tại nhà trọn gói để có không gian sống trong lành, sạch sẽ.</p>
							</div>
							<a class="btnn-secondary" name ="submit" href="services.php">Đặt Dịch Vụ Ngay</a>
						</div>
					</div>
			
					<div class="dichvu-items">
						<div class="dichvu-item">
							<div class="dichvu-img">
								<img src="images/gv2.png" alt="">
							</div>
							<div class="dichvu-title">
								<h2> Tổng vệ sinh nhà cửa</h2>
								<p> Tổng vệ sinh nhà cửa giúp bạn có môi trường sống trong lành. Hơn 200.00 Khách hàng đã sử dụng và hài lòng với dịch vụ Tổng vệ sinh của JupViec.</p>
							</div>
							<a class="btnn-secondary" style="margin-bottom:20px;" name ="submit" href="services.php">Đặt Dịch Vụ Ngay</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="numbering" >
			<div class="container">
				<div class="ro">
					<div class="section-title">
						<h2> Ưu Điểm Của JupViec </h2>
					</div>
				</div>
				<div class="ro">
					<div class="numbering-items">
					<div class="numbering-item">
						<div class="numbering-item-img">
						<img src="images/smiles.png" alt="" >
						</div>
					</div>
					<div class="numbering-item">
					<h4>AN TÂM HƠN - HÀI LÒNG HƠN</h4>
					<div class="numbering-collums">
						<div class="images-icon">
							<img src="images/heart.png" alt="">
						</div>
						<div class="icon-content">
							<p>AN TÂM - HÀI LÒNG</p>
							<span>"Con người tốt" là giá trị đầu tiên chúng tôi muốn mang lại cho bạn.
								Người giúp việc có lý lịch rõ ràng, thật thà, sức khỏe tốt 
								được đào tạo bài bản các nghiệp vụ giúp việc gia đình. Mang tới cuộc sống thoải mái, tiện lợi, dễ dàng hơn cho mọi gia đình tại Việt Nam.
			  				</span>
						</div>
			  		</div>		
					  <div class="numbering-collums">
						<div class="images-icon">
							<img src="images/foder.png" alt="">
						</div>
						<div class="icon-content">
							<p>NHANH CHÓNG - TIẾT KIỆM</p>
							<span> Cung ứng người giúp việc đáp ứng như cầu của quý khách. Tiết kiệm thời gian, tiền
								bạc, chi phí cạnh tranh, không phát sinh bất kỳ chi phí nào so với hợp đồng. Nâng cao giá trị của nghề giúp việc, mang tới cái nhìn mới về công việc ý nghĩa, thiết thực và hữu ích này trong xã hội.
			  				</span>
						</div>
			  		</div>		
					  <div class="numbering-collums">
						<div class="images-icon">
							<img src="images/like.png" alt="">
						</div>
						<div class="icon-content">
							<p>UY TÍN - CHUYÊN NGHIỆP</p>
							<span> Là công ty cung ứng dịch vụ giúp việc nhà chuyên nghiệp - uy tín tại Thành phố Đà
								Nẵng, cam kết mang lại sự hài lòng tuyệt đối cho khách hnafg. Đó cũng chính là giá trị " Dịch vụ tốt" 
								mà chúng tôi hướng tới. Không ngừng phát triển để vươn rộng hơn, nâng cao hơn nữa chất lượng cuộc sống.
			  				</span>
						</div>
			  		</div>	
					</div>		

					</div>
				</div>
				
			</div>
	</section>
		<!-- <br> -->


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
