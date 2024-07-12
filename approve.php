<?php
session_start();
require 'includes/config.inc.php';
$username=$_SESSION['username'];
extract($_REQUEST);
 $query_search = "SELECT * FROM srequest where student_roll_no='$student_roll_no'";
 $result_search = mysqli_query($conn,$query_search);
 $row_search = mysqli_fetch_assoc($result_search);
$qry = "UPDATE srequest SET status='1' where student_roll_no='$student_roll_no'";
$result = mysqli_query($conn,$qry);
if($result)
		{
		
		?>
        <script language="javascript">
            alert("Successfully Approved");
            window.location.href='staff_request.php';
            </script>
            <?php
            }
            else{
                echo "Error";
            }
        

?>
