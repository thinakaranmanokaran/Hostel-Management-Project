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
<br><br><br>


<?php
   	  $s=mysqli_query($connect, "select * from student where student_roll_no='$student_roll_no'");
      $r=mysqli_fetch_array($s);
      $student_roll_no=$r['student_roll_no'];
      $student_roll_no=$r['student_roll_no'];
      $full=$r['Fname']. $r['Lname'];
      
       $sql=mysqli_query($connect,"select * from leave_apply where student_roll_no='$student_roll_no'");
       $n=mysqli_num_rows($sql);
   	   ?>
   	   <div class="container">
          <h2 class="heading text-capitalize mb-sm-5 mb-4">Track Leave Request </h2>

   	   <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student ID</th>
        <th>From</th>
        <th>To</th>
        <th>Reason</th>
        <th>Status</th>

      </tr>
    </thead>
    <tbody>
<?php

   	   	  while($r1 = mysqli_fetch_array($sql)){

            ?>
            
      		<tr><td><?php echo $full;?></td><td><?php echo $r1['student_roll_no'];?></td><td><?php echo $r1['fdate'];?></td><td><?php echo $r1['tdate'];?></td><td><?php echo $r1['reason'];?></td>
		  <td>
            <?php
            if($r1['status']==0)
            {
               echo "Request Submitted";
            }
            elseif($r1['status']==1)
            {
                echo "Parent Approved";
            }
            elseif($r1['status']==2)
            {
                echo "Staff Approved";
            }
            elseif($r1['status']==3)
            {
                echo "Hostel Approved";
            }
            else{
                echo "";
            }
            ?>
          </td>
        
        </tr>
			<?php
		  }
		  ?>
   
   
   </tbody>
  </table>
</div>



<br>
<br>
<br>

<!-- footer -->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand"  href="" target="_blank" >HMS<span class="display"></span></a>
		</div>
		<div class="footer-grid">
			
			<div class="list-footer">
				<ul class="footer-nav text-center">
					<li>
						<a href="home_manager.php">Home</a>
					</li>
					<li>
						<a href="allocate_room.php">Allocate</a>
					</li>
					
					<li>
						<a href="contact_manager.php">Contact</a>
					</li>
					<li>
						<a href="admin/manager_profile.php">Profile</a>
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

	<!-- banner js -->
	<script src="web_home/js/snap.svg-min.js"></script>
	<script src="web_home/js/main.js"></script> <!-- Resource jQuery -->
	<!-- //banner js -->

	<!-- flexSlider --><!-- for testimonials -->
	<script defer src="web_home/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
	<!-- //flexSlider --><!-- for testimonials -->

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

