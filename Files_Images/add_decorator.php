<?php
	$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
	$msg = "";
	if (isset($_POST['upload'])) 
	{
		$target = "Decorator/".basename($_FILES['image']['name']);

		$dname= $_POST['dname'];
		$daddress= $_POST['daddress'];
		$dcontact= $_POST['dcontact'];
		$dprice= $_POST['dprice'];
		$dratings= $_POST['dratings'];
		$image = $_FILES['image']['name'];
	
		$sql = "INSERT INTO decorator (Dname, DOaddress, DContact, DPrice, Dratings, Dimages)VALUES('$dname', '$daddress', '$dcontact', '$dprice', '$dratings', '$image')";
		
		if ($conn->query($sql) === TRUE) 
		{
			echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
		} 
		else 
		{
			echo "<script type='text/javascript'>alert('Failed!')</script>";
		}	
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
		{
			$msg = "Image uploaded successfully";
		}
		else
		{
			$msg = "Failed to upload image";
		}
		$conn->close();
	}
?>
<html>
<body>

	<html>
	<body>
		<center>
		<table border="0" cellspacing="10px" cellpadding="10px">
		<form method="post" action="add_decorator.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<tr><th colspan="2"> Add Decorator Details </th></tr>
			<tr><td>Decorator Name : </td><td><input type="text" name="dname" size="20"></td></tr>
			<tr><td>Address : </td><td><input type="text" name="daddress" size="20"></td></tr>
			<tr><td>Contact : </td><td><input type="text" name="dcontact" pattern="[789][0-9]{9}" size="20"></td></tr>
			<tr><td>Price : </td><td><input type="text" name="dprice" size="20"></td></tr>
			<tr><td>Ratings : </td><td><input type="text" name="dratings" size="20"></td></tr>
			<tr><td colspan="2" align="center"><input type="file" name="image"></td></tr>
			<tr><td colspan="2" align="center"><button type="submit" name="upload">Submit</button></td></tr>
		</form>
		</center>
	</body>
</html>
</body>
</html>
