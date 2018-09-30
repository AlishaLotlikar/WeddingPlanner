<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "weddingplanner";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	//if (isset($_POST['submit']))

	$Uid = $_GET['Caid'];
		
	$query = ("DELETE from caterer where Caid='$Uid'");
	if(mysqli_query($conn,$query))
	{
		echo"<script>
				alert('DELETED SUCCESSFULLY');
				window.location.href='view_caterer.php';
			</script>";
	}
	else
	{
		echo"<script>
				 alert('FAILED TO DELETE');
			</script>";
	}




?>