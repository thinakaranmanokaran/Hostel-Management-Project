<?php
session_start();
require 'config.inc.php';
if(isset($_POST['login-submit'])){
    $idno=$_POST['idno'];
    $Pwd=$_POST['Pwd'];
    $s= "select * from  staff where idno='$idno' and Pwd= '$Pwd'";   

   $qu= mysqli_query($conn, $s);
   if(mysqli_num_rows($qu)>0){
      $f= mysqli_fetch_assoc($qu);
	  $_SESSION['idno']=$idno;
      
        //header("location:addhearingdate.php");
        ?>
        <script language="javascript">
alert("Login Successfully");
window.location.href="home1.php";
</script>
<?php
}
else
{
echo "Error";
}


        }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HMS</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="web/css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="web/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->

</head>


<body>
    <h1>Hostel Room Allocation System</h1>
    <div class=" w3l-login-form">
        <h2>Staff Login</h2>
        <form action="" method="POST">

            <div class=" w3l-form-group">
                <label>Staff Id Card No:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="idno" placeholder="Staff Id Card No" required="required" />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="Pwd" placeholder="Password" required="required" />
                </div>
            </div>
            <!--<div class="forgot">
                <a href="#">Forgot Password?</a>
                <p><input type="checkbox">Remember Me</p>
            </div>-->
            <button type="submit" name="login-submit">Login</button>
        </form>
          <p class=" w3l-register-p">Login as<a href="login-hostel_manager.php" class="register"> Hostel-Manager/Admin</a></p>
        <p class=" w3l-register-p">Don't have an account?<a href="signup.php" class="register"> Sign up</a></p>
        <p class=" w3l-register-p">Staff account<a href="sregister.php" class="register"> Sign up</a></p>

    </div>
    <footer>
    <p class="copyright-agileinfo"> &copy; All Rights Reserved | Design by <a href="index.php">Hostel Management</a></p>
    </footer>

</body>

</html>
