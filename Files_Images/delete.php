<?php
$cid=$_GET['cust'];
	$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
	if (isset($_POST['delete'])) 
	{
		$sql="delete from cart where Customer_ID='$cid'";
		if ($conn->query($sql) === TRUE) 
		{
			echo "<script type='text/javascript'>alert('Successfully Deleted')</script>";
			echo "<script>location.replace('WeddingPlannerC.html')</script>";
		} 
		else 
		{
			echo "<script type='text/javascript'>alert('Failed to Delete')</script>";
		}
	}
	$conn->close();
?>