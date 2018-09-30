
<?php
// define variables and set to empty values
	session_start();
	
	
	$db = mysqli_connect('localhost', 'root', '', 'weddingplanner');
	$username = $password = "";
	
	if (isset($_POST['login_user'])) {
		
		$Username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		
		
		
		if($Username=='admin' and $password=='admin') // admin login
		{
			header('location: ../WeddingPlannerA.html');
			
		}
		
		$sql = "SELECT * FROM user where Uemail='$Username' AND Upassword='$password'";//user login
		$result = mysqli_query($db,$sql);
		if(mysqli_num_rows($result)==1)
		{
			header('location: ../WeddingPlannerC.html');
			$_SESSION['username'] = $Username; 
			//To fetch the user name in homepage use:  $user=$_SESSION['username'];
			echo(" <SCRIPT LANGUAGE='JavaScript'>
						window.alert('Success Username:$Username Password:$password')
					</SCRIPT>"
				);
		}
		
		$sql = "SELECT * FROM planner where Pemail='$Username' AND Password='$password'";//planner login
		$result = mysqli_query($db,$sql);
		if(mysqli_num_rows($result)==1)
		{
			header('location: ../WeddingPlannerP.html');
			$_SESSION['username'] = $Username; 
			//To fetch the user name in homepage use:  $user=$_SESSION['username'];
			echo("	<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Success Username:$Username Password:$password')
					</SCRIPT>"
				);
		}
	}

?>