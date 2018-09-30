<?php
	$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
	$msg = "";
	if (isset($_POST['upload'])) 
	{
		$target = "Details/".basename($_FILES['image']['name']);

		$Name= $_POST['name'];
		$College= $_POST['college'];
		$Contact= $_POST['contact'];
		$Email= $_POST['email'];
		$image = $_FILES['image']['name'];
	
		$sql = "INSERT INTO aboutus (Name, College, Contact, Email, Image)VALUES 
		('$Name', '$College', '$Contact', '$Email', '$image')";
		
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
		<form method="post" action="add_aboutus.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<tr><th colspan="2"> Add Details </th></tr>
			<tr><td>Name : </td><td><input type="text" name="name" size="50"></td></tr>
			<tr><td>College : </td><td><input type="text" name="college" size="50"></td></tr>
			<tr><td>Contact : </td><td><input type="text" name="contact" pattern="[789][0-9]{9}" size="50"></td></tr>
			<tr><td>Email : </td><td><input type="text" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" size="50"></td></tr>
			<tr><td colspan="2" align="center"><input type="file" name="image" ></td></tr>
			<tr><td colspan="2" align="center"><button type="submit" name="upload">Submit</button></td></tr>
		</form>
		</center>
	</body>
</html>
</body>
</html>
