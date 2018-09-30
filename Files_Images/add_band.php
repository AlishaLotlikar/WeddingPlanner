<?php
	$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
	$msg = "";
	if (isset($_POST['upload'])) 
	{
		$target = "Band/".basename($_FILES['image']['name']);

		$bandname= $_POST['bandname'];
		$bandaddress= $_POST['bandaddress'];
		$bandcontact= $_POST['bandcontact'];
		$bandprice= $_POST['bandprice'];
		$bandratings= $_POST['bandratings'];
		$image = $_FILES['image']['name'];
	
		$sql = "INSERT INTO band (bandname, bandaddress, bandcontact, bandprice, bandratings, bandimages)VALUES 
		('$bandname', '$bandaddress', '$bandcontact', '$bandprice', '$bandratings', '$image')";
		
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
		<form method="post" action="add_band.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<tr><th colspan="2"> Add Band Details </th></tr>
			<tr><td>Band Name : </td><td><input type="text" name="bandname" size="20"></td></tr>
			<tr><td>Address : </td><td><input type="text" name="bandaddress" size="20"></td></tr>
			<tr><td>Contact : </td><td><input type="text" name="bandcontact" pattern="[789][0-9]{9}" size="20"></td></tr>
			<tr><td>Price : </td><td><input type="text" name="bandprice" size="20"></td></tr>
			<tr><td>Ratings : </td><td><input type="text" name="bandratings" size="20"></td></tr>
			<tr><td colspan="2" align="center"><input type="file" name="image"></td></tr>
			<tr><td colspan="2" align="center"><button type="submit" name="upload">Submit</button></td></tr>
		</form>
		</center>
	</body>
</html>
</body>
</html>
