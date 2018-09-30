<?php
	$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
	$msg = "";
	if (isset($_POST['upload'])) 
	{
		$target = "MC/".basename($_FILES['image']['name']);

		$mcname= $_POST['mcname'];
		$mcaddress= $_POST['mcaddress'];
		$mccontact= $_POST['mccontact'];
		$mcprice= $_POST['mcprice'];
		$mcratings= $_POST['mcratings'];
		$image = $_FILES['image']['name'];
	
		$sql = "INSERT INTO mc (mcname, mcaddress, mccontact, mcprice, mcratings, mcimages)VALUES 
		('$mcname', '$mcaddress', '$mccontact', '$mcprice', '$mcratings', '$image')";
		
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
		<form method="post" action="add_mc.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<tr><th colspan="2"> Add MC Details </th></tr>
			<tr><td>MC Name : </td><td><input type="text" name="mcname" size="20"></td></tr>
			<tr><td>Address : </td><td><input type="text" name="mcaddress" size="20"></td></tr>
			<tr><td>Contact : </td><td><input type="text" name="mccontact" pattern="[789][0-9]{9}" size="20"></td></tr>
			<tr><td>Price : </td><td><input type="text" name="mcprice" size="20"></td></tr>
			<tr><td>Ratings : </td><td><input type="text" name="mcratings" size="20"></td></tr>
			<tr><td colspan="2" align="center"><input type="file" name="image"></td></tr>
			<tr><td colspan="2" align="center"><button type="submit" name="upload">Submit</button></td></tr>
		</form>
		</center>
	</body>
</html>
</body>
</html>
