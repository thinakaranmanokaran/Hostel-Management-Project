<?php
session_start();
include("dbconnect.php");
$student_roll_no=$_SESSION['student_roll_no'];
  require 'config.inc.php';
  extract($_POST);

  if(isset($submit))
  {
  $rdate=date("d-m-Y");
  
  
  $mq=mysqli_query($connect,"select max(id) from leave_apply");
  $mr=mysqli_fetch_array($mq);
  $id=$mr['max(id)']+1;

  $ins=mysqli_query($connect,"insert into leave_apply(id,student_roll_no,fdate,tdate,reason,status,rdate) values($id,'$student_roll_no','$fdate','$tdate','$reason','0','$rdate')");
      if($ins)
      {
          $q2=mysqli_query($connect,"select * from student where student_roll_no='$student_roll_no'");
          $r2=mysqli_fetch_array($q2);
          $Fname=$r2['Fname'];
          $Lname=$r2['Lname'];
          $fullName = $Fname . ' ' . $Lname;
          $email=$r2['email'];
          $faname=$r2['faname'];
          $mobile1=$r2['mobile1'];
          $mess1="leave request alert in your mail";
          $mess="Dear [$faname],inform you that your child, [$fullName], has requested leave from [$fdate] to [$tdate] due to [$reason].";
           

  		         echo '<iframe src="http://iotcloud.co.in/testsms/sms.php?sms=emr&name='.$faname.'&mess='.$mess1.'&mobile='.$mobile1.'"></iframe>'; 

                          echo '<iframe src="http://iotcloud.co.in/testmail/testmail1.php?message='.$mess.'&email='.$email.'&subject=Student Leave Request" frameborder="0" style="display:none"></iframe>';
  
       
      //header("location:add_course.php?act=interview");
      
      ?>
      <script>
  //Using setTimeout to execute a function after 5 seconds.
  setTimeout(function () {
     //Redirect with JavaScript
     window.location.href= '';
  }, 6000);
  </script>
      <?php
      }
      else
      {
      //header("location:add_course.php?act=wrong");
      }
  }
  
  


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>HMS</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<!-- web-fonts -->
	<!-- //web-fonts -->
	
</head>

<body>

<!-- banner -->
<div class="inner-page-banner" id="home"> 	   
	<!--Header-->
	<header>
	<div class="container agile-banner_nav">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">

			<h1><a class="navbar-brand" href="home.php">HMS <span class="display"></span></a></h1>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="services.php">Hostels</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact</a>
					</li>

					<li class="nav-item active">
							<a class="nav-link" href="pay.php">Bill</a>
						</li>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $student_roll_no;?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="profile.php">My Profile</a>
							</li>
							<li>
								<a href="leave.php">Leave Apply</a>
							</li>
							<li>
								<a href="track.php">Track Status</a>
							</li>
							<li>
								<a href="entry.php">Entry</a>
							</li>
							<li>
								<a href="includes/logout.inc.php">Logout</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>

		</nav>
	</div>
</header>

	<!--Header-->
</div>
<!-- //banner --> 

<!-- contact -->

<section class="contact py-5">
    <div class="container">
        <center><h2 class="heading text-capitalize mb-sm-5 mb-4">Leave Request</h2></center>
        <div class="mail_grid_w3l" style="padding-left:400px;width: 100%;margin: 0 auto;">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6 contact_left_grid" data-aos="fade-right">
                        <div class="contact-fields-w3ls">From Date
                            <input type="date" name="fdate" placeholder="Father name" required="">
                        </div>
                        <div class="contact-fields-w3ls">To Date
                            <input type="date" name="tdate" placeholder="Mother name" required="">
                        </div>
                        <div class="contact-fields-w3ls">Reason
                            <textarea name="reason" id="" cols="10" rows="10"></textarea>

                        </div>
                        
                    </div>
                    <div class="col-md-6 contact_left_grid" data-aos="fade-left">
                        <!-- Removed the input from here -->
                    </div>
                </div>
                <!-- Moved the submit button outside of the row -->
                <div class="row">
                    <div class="col-md-6 text-center">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- //contact -->
<br><br>

<!-- footer -->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand" href="index.php" target="_blank">HMS <span class="display"></span></a>
		</div>
		<div class="footer-grid">
			
			<div class="list-footer">
				<ul class="footer-nav text-center">
					<li>
						<a href="home.php">Home</a>
					</li>
					<li>
						<a href="services.php">Hostels</a>
					</li>
					
					<li>
						<a href="contact.php">Contact</a>
					</li>
					<li>
						<a href="profile.php">Profile</a>
					</li>
				</ul>
			</div>
			
		</div>
	</div>
</footer>
<!-- footer -->

<!-- js-scripts -->		

	<!-- js -->
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->

	<!-- start-smoth-scrolling -->
	<script src="web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="web_home/js/move-top.js"></script>
	<script type="text/javascript" src="web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->
	
<!-- //js-scripts -->

</body>
</html>

