<?php
session_start();
$student_roll_no=$_SESSION['student_roll_no'];

		  require 'config.inc.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>User Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Consultancy Profile Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- js -->
<script src="web_profile/js/jquery-2.1.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="web_profile/js/sliding.form.js"></script>
<!-- //js -->
<link href="web_profile/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="web_profile/css/font-awesome.min.css" />
<link rel="stylesheet" href="web_profile/css/smoothbox.css" type='text/css' media="all" />
<link href="//fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<script type="application/x-javascript">
	addEventListener("load", function () {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	}
</script>
<!--// Meta tag Keywords -->

<link href="web_home/css_home/slider.css" type="text/css" rel="stylesheet" media="all">

<!-- css files -->
<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->

<!-- testimonials css -->
<link rel="stylesheet" href="web_home/css_home/flexslider.css" type="text/css" media="screen" property="" /><!-- flexslider css -->
<!-- //testimonials css -->

<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<!-- //web-fonts -->


</head>
<body>
	<!-- banner -->
		<div class="banner" id="home">
			<div class="cd-radial-slider-wrapper">

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
<br><br><br><br><br>
	<div class="main">
		<div id="navigation" style="display:none;" class="w3_agile">
			<ul>
				<li class="selected">
					<a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span>Info</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-folder" aria-hidden="true"></i><span>Family</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span>Contact</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span>Staff</span></a>
				</li>
			</ul>
		</div>
		<div id="wrapper" class="w3ls_wrapper w3layouts_wrapper">
			<div id="steps" style="margin:0 auto;" class="agileits w3_steps">
				<form id="formElem" name="formElem" action="#" method="post" class="w3_form w3l_form_fancy">
					<fieldset class="step agileinfo w3ls_fancy_step">
						<legend>Personal Info</legend>
						<div class="abt-agile">
							<div class="abt-agile-left">
							</div>
							<div class="abt-agile-right">
								<?php
							$s= "select * from  student where student_roll_no='$student_roll_no'";   
   $qu= mysqli_query($conn, $s);
   
      $f= mysqli_fetch_assoc($qu);
	  ?>
								<h3><?php echo $f['Fname']." ".$f['Lname']; ?></h3>
								<h5>Student</h5>
								<ul class="address">
									<li>
										<ul class="address-text">
											<li><b>Roll No </b></li>
											<li>: <?php echo $f['student_roll_no']; ?></li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
											<li><b>PHONE </b></li>
											<li>: <?php echo $f['Mob_no']; ?></li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
											<li><b>DEPT </b></li>
											<li>: <?php echo $f['Dept']; ?></li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
											<li><b>YEAR OF STUDY </b></li>
											<li>: <?php echo $f['Year_of_study']; ?></li>
										</ul>
									</li>
									

								</ul>
							</div>
								<div class="clear"></div>
						</div>
				</fieldset>
				<fieldset class="step agileinfo w3ls_fancy_step">
						<a href="addfamilydet.php" title="Add Family Info"><legend>Family Info</legend></a>
						<div class="abt-agile">
							<div class="abt-agile-left">
							</div>
							<div class="abt-agile-right">
								<?php
							$s= "select * from  student where student_roll_no='$student_roll_no'";   
   $qu= mysqli_query($conn, $s);
   
      $f= mysqli_fetch_assoc($qu);
	  ?>
								
								<ul class="address">
									<li>
										<ul class="address-text">
											<li><b>Father Name </b></li>
											<li>: <?php echo $f['faname']; ?></li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
											<li><b>Mother Name </b></li>
											<li>: <?php echo $f['mname']; ?></li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
											<li><b>Mobile 1 </b></li>
											<li>: <?php echo $f['mobile1']; ?></li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
											<li><b>Mobile2 </b></li>
											<li>: <?php echo $f['mobile2']; ?></li>
										</ul>
									</li>
									<li>
										<ul class="address-text">
											<li><b>Email </b></li>
											<li>: <?php echo $f['email']; ?></li>
										</ul>
									</li>
									

								</ul>
							</div>
								<div class="clear"></div>
						</div>
				</fieldset>
				
				<fieldset class="step agileinfo w3ls_fancy_step">
					<legend>Hostel Info</legend>
					<div class="abt-agile">
						<div class="abt-agile-left-hostel">
						</div>
						<div class="abt-agile-right">
						<?php

$sql = "SELECT * FROM room WHERE student_roll_no='$student_roll_no'";
$result = mysqli_query($conn, $sql);
if($row = mysqli_fetch_assoc($result)){
	$student_name = $row['student_name'];
	$Room_No = $row['Room_No'];

}
else {
	echo "";
}

?>
<?php
 $query_search = "SELECT * FROM room WHERE student_roll_no = '$student_roll_no'";
 $result_search = mysqli_query($conn,$query_search);
 $row_search = mysqli_fetch_assoc($result_search);
 $student_name = $row_search['student_name'];
 
		   if($row_search['Room_id']=="1")
		   {
			$Hostel_Name='A';
		   }
		   else if($row_search['Room_id']=="2")
		   {
			   $Hostel_Name='B';
		   }
		   else if($row_search['Room_id']=="3")
		   {
			   $Hostel_Name='C';
		   }
		   else if($row_search['Room_id']=="4")
		   {
			   $Hostel_Name='D';
		   }
		   else if($row_search['Room_id']=="5")
		   {
			   $Hostel_Name='E';
		   }
		   else if($row_search['Room_id']=="6")
		   {
			   $Hostel_Name='F';
		   }
		   else
		   {
		   echo "No Room";
		   }

		   ?>


							<h3><?php echo $student_name; ?></h3>
							<h5>Student</h5>
							<ul class="address">
								<li>
									<ul class="address-text">
										<li><b>HOSTEL </b></li>


										<li>: <?php echo $Hostel_Name; ?></li>
									</ul>
								</li>
								<li>
									<ul class="address-text">
										<li><b>ROOM NO </b></li>
											
										<li>: <?php echo $Room_No; ?></li>
									</ul>
								</li>
							</ul>
						</div>
							<div class="clear"></div>
					</div>
			</fieldset>
					<!--	<fieldset class="step wthree">
						<legend>Work</legend>
						<div class="work-w3agile">
							<div class="work-w3agile-top">
								<div class="agileits_w3layouts_work_grid1 w3layouts_work_grid1 hover14 column">
									<div class="w3_agile_work_effect">
										<ul>
											<li>
												<a href="web_profile/images/c1.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="web_profile/images/c1.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="web_profile/images/c2.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="web_profile/images/c2.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="web_profile/images/c3.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="web_profile/images/c3.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="web_profile/images/c4.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="web_profile/images/c4.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="web_profile/images/c5.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="web_profile/images/c5.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
											<li>
												<a href="web_profile/images/c6.jpg" class="sb" title="Quis Nostrud Exercitation Ullamco Laboris Quis Autem Vel Eum Iure Reprehenderit">
													<figure>
														<img src="web_profile/images/c6.jpg" alt=" " class="img-responsive" />
													</figure>
												</a>
											</li>
												<div class="clear"></div>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</fieldset>-->
					<fieldset class="step agileinfo w3ls_fancy_step">
						<legend>Hostel Manager Info</legend>
						<div class="abt-agile">
							<div class="abt-agile-left">
							</div>
							<div class="abt-agile-right">
								<?php
									$sql1 = "SELECT * FROM Hostel_Manager";
									$result1 = mysqli_query($conn, $sql1);
									if($row1 = mysqli_fetch_assoc($result1)){
										$hmfname = $row1['Fname'];
										$hmlname = $row1['Lname'];
										$hmMob  = $row1['Mob_no'];
									}
									else {
										$hmfname = 'none';
										$hmlname = 'none';
										$hmMob  = 'none';
									}
								 ?>
								<h3><?php echo $hmfname." ".$hmlname; ?></h3>
								<h5>Admin</h5>
								<ul class="address">
									<li>
										<ul class="address-text">
											<li><b>PHONE </b></li>
											<li>: <?php echo $hmMob; ?></li>
										</ul>
									</li>

								</ul>
							</div>
								<div class="clear"></div>
						</div>
				</fieldset>
				<fieldset class="step agileinfo w3ls_fancy_step">
						<legend>Staff Request</legend>
						<div class="abt-agile">
							<div class="abt-agile-left">
							</div>
							<div class="abt-agile-right">
								<?php
									$sql1 = "SELECT * FROM srequest WHERE student_roll_no='$student_roll_no' AND status='1'";
									$result1 = mysqli_query($conn, $sql1);
									if($row1 = mysqli_fetch_assoc($result1)){
										$staff = $row1['staff'];
										$hmlname = $row1['Lname'];
										$hmMob  = $row1['Mob_no'];
										
									}
									else {
										$staff = 'none';
										
									}
								 ?>
								<h3><?php echo $staff; ?></h3>
								<h5>Staff</h5>
								<ul class="address">
									<li>

									</li>

								</ul>
							</div>
								<div class="clear"></div>
						</div>
				</fieldset>
				</form>
			</div>
		</div>

	</div>
	<script type="text/javascript" src="web_profile/js/smoothbox.jquery2.js"></script>
</body>
</html>
