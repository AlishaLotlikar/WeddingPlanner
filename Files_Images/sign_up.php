<?php
		$db = mysqli_connect('localhost', 'root', '', 'weddingplanner');

	
	if (isset($_POST['register']))
	{
		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
	    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
		$contact = mysqli_real_escape_string($db, $_POST['contact']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['psw']);
		$password1 = mysqli_real_escape_string($db, $_POST['psw-repeat']);
		
		if($password==$password1){

		 $query = ("INSERT INTO user ( Ufirstname, Ulastname, UContact,Uemail,Upassword) VALUES ( '$firstname', '$lastname', '$contact','$email','$password')");
		 if(mysqli_query($db,$query))
		{
			//echo "<script>alert('You are now Registered');</script>";
			echo"<script>
					alert('Registered Successfully');
					window.location.href='../WeddingPlanner.html';
				</script>";
		}
		else
		{
				echo"<script>
					alert('Registration failed');
					window.location.href='Sign_up.html';
				</script>";
		}//header("Location: InsertPlanner.html");
	}
	}


?>