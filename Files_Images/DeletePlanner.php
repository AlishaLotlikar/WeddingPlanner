<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "weddingplanner";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//if (isset($_POST['submit']))
	$Pid=$_GET['Pid'];
	$query = ("DELETE from Planner where Pid='$Pid'");
	if(mysqli_query($conn,$query))
	{
		echo "<script>
			alert('DELETED SUCCESSFULLY');
			window.location.href='ViewPlanners.php';
			</script>";
	}
	else
	{
		echo"<script>
			 alert('FAILED TO DELETE');
			 </script>";
	}





?>
