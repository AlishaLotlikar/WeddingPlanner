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
if (isset($_POST['submit']))
	{
		$firstname = mysqli_real_escape_string($conn, $_POST['FirstName']);
	    $lastname = mysqli_real_escape_string($conn, $_POST['LastName']);
		$number = mysqli_real_escape_string($conn, $_POST['number']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['psw']);
		$password1 = mysqli_real_escape_string($conn, $_POST['psw-repeat']);
		
		if($password==$password1)
		{
			$query = ("INSERT INTO planner ( Pfirstname, Plastname, Pcontact,Pemail,Password) VALUES ( '$firstname', '$lastname', '$number','$email','$password')");
			if(mysqli_query($conn,$query))
			{
				//echo "<script>alert('INSERTED SUCCESSFULLY');</script>";
				echo "<script>
						alert('INSERTED SUCCESSFULLY');
						window.location.href='ViewPlanners.php';
					</script>";
			}
			else
			{
				echo "<script>alert('FAILED TO INSERT');</script>";
			}//header("Location: InsertPlanner.html");
		}
	}



?>
