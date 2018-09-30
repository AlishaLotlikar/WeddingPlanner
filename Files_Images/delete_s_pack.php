<?php 
		$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
		
		$pack = $_GET['pckgid'];
		
		$sql1= "DELETE from silverpackage where Pckgid='$pack'";
		
		if($conn->query($sql1)==true)
		{
			//echo "Deleted Successfully!";
		}
		$sql2= "DELETE from package where Pckgid='$pack'";
		if($conn->query($sql2)==true)
		{
			//echo "Deleted Successfully!";
		}
		$conn->close();
?>