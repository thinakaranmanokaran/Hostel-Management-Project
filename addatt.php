<?php
session_start();
include("dbconnect.php");
  require 'includes/config.inc.php';
  $username=$_SESSION['username'];
  extract($_POST);
$rdate=date("d-m-Y");
$username=$_SESSION['username'];
if(isset($_POST['att'])){
    
  
    foreach ($_POST['a_status'] as $i => $a_status) {
      
      $student_roll_no = $_POST['student_roll_no'][$i];
      $q1=mysqli_query($connect, "select * from s_attendance where student_roll_no='$student_roll_no' and rdate='$rdate'");
    $n1=mysqli_num_rows($q1);
        if($n1==0)
        {
      $mq=mysqli_query($connect, "select max(id) from s_attendance");
	$mr=mysqli_fetch_array($mq);
	$id=$mr['max(id)']+1;
      $stat = mysqli_query($connect, "insert into s_attendance(id,student_roll_no,a_status,rdate) values($id,'$student_roll_no','$a_status','$rdate')");
      if($stat)
      {
        ?>
        <script>
            alert("Attendance Taken Successfully!");
     window.location.href= '';
  </script><?php
          //header("location:view_cus.php");
          }
          
          
          
  
      }
      else{
        ?>
        <script>
        alert("Attendance Already Taken");
 window.location.href= '';
</script>
<?php
    }
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
	<!--bootsrap -->

	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	

</head>

<body>

<!-- banner -->
<div class="inner-page-banner" id="home"> 	   
	<!--Header-->
	<header>
	<div class="container agile-banner_nav">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">

			<h1><a class="navbar-brand" href="home_manager.php">Hostel <span class="display"></span></a></h1>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="home_manager.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="allocate_room.php">Allocate Rooms</a>
					</li>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Bill
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="billgenereate.php">Bill</a>
							</li>
							<li>
								<a href="paymenthistory.php">History</a>
							</li>
						</ul>
					</li>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Students
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="studet.php">Details</a>
							</li>
							<li>
								<a href="addatt.php">Attendance</a>
							</li>
							<li>
								<a href="paymenthistory.php">Status</a>
							</li>
							<li>
								<a href="requestview3.php">Leave Request</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="staff_request.php">Staff Request</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="message_hostel_manager.php">Messages Received</a>
					</li>
					
					
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							
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


<?php
   
   	   $query_search = "SELECT * FROM student";
   	   $result_search = mysqli_query($connect,$query_search);

      
   	   ?>
   	   <div class="container">
          <h2 class="heading text-capitalize mb-sm-5 mb-4">Add Attendance</h2>
          <a href="attreport.php"><p style="padding-left:85%;color:blue">Attendance Report</p></a>
<form action="" method="post">
   	   <table class="table table-hover">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Department</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
   	   if(mysqli_num_rows($result_search)==0){
   	   	  echo '<tr><td colspan="4">No Rows Returned</td></tr>';
   	   }
   	   else{
        $radio = 0;

   	   	  while($row_search = mysqli_fetch_assoc($result_search)){
            $student_roll_no = $row_search['student_roll_no'];

            $query7 = "SELECT * FROM Student WHERE student_roll_no = '$student_roll_no'";
            $result7 = mysqli_query($conn,$query7);
            $row7 = mysqli_fetch_assoc($result7);
            $student_name = $row7['Fname']." ".$row7['Lname'];
			?>
            
      		<tr><td><?php echo $row_search['student_roll_no'];?></td><td><?php echo $student_name;?></td>
			<td><?php echo $row_search['Dept'];?></td>
            <td style=""><span style="color:green">Present</span> <input type="radio" name="a_status[<?php echo $radio; ?>]" value="Present" checked>
            <span style="color:red">Absent</span> <input type="radio" name="a_status[<?php echo $radio; ?>]" value="Absent"></td>
<input type="hidden" name="student_roll_no[]" value="<?php echo $row_search['student_roll_no'];?>"> 


		  </tr>
			<?php
                                        $radio++;

		  }
		  ?>
   
   
   </tbody>
  </table>
  <button type="submit" name="att" class="btn btn-primary">Take Attendance</button><br><br>

  </form>
</div>
<?php
}
  
	   
  ?>




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

