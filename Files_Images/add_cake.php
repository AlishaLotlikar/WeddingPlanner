<html>
<?php
	$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
	$msg = "";
	if (isset($_POST['upload'])) 
	{
		$target = "Cake/".basename($_FILES['image']['name']);

		$cakename= $_POST['cakename'];
		$caketype= $_POST['caketype'];
		$cakePrice= $_POST['cakePrice'];
		$cakeratings= $_POST['cakeratings'];
		$image = $_FILES['image']['name'];
		
		$cpname=$_POST['cpname'];
		$cpaddress=$_POST['cpaddress'];
		$cpcontact=$_POST['cpcontact'];
		
		$option=$_POST['opt'];
		
		if($option=='select')
		{
			$sql1 = "INSERT INTO cakeproducers(cpname, cpaddress, cpcontact)VALUES('$cpname', '$cpaddress', '$cpcontact')";
			$conn->query($sql1);
			$sql2 = "SELECT cpid FROM cakeproducers where cpname='$cpname'";
			$result=$conn->query($sql2);
			
			while($row = $result->fetch_assoc()) 
			{
				$sql3 = "INSERT INTO cake (cakename, caketype, cakePrice, cakeratings, cpid, cakeimages) VALUES ('$cakename', '$caketype', '$cakePrice','$cakeratings', '{$row['cpid']}', '$image')";
			}
		}
		else
		{ 	
			$sql2 = "SELECT cpid FROM cakeproducers where cpname='$option'";
			$result=$conn->query($sql2);
			while($row = $result->fetch_assoc()) 
			{
				$sql3 = "INSERT INTO cake (cakename, caketype, cakePrice, cakeratings, cpid, cakeimages) VALUES ('$cakename', '$caketype', '$cakePrice','$cakeratings', '{$row['cpid']}', '$image')";
			}
		}
		if ($conn->query($sql3) === TRUE) 
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
<head>
<script>
 function myFunction() 
 {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") 
	{
        x.style.display = "block";
    } 
	else 
	{
        x.style.display = "none";
    }
}
</script>
</head>
<body>
	<center>
		<div>
		<table border="0" cellspacing="10px" cellpadding="10px">
		<form method="post" action="add_cake.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<tr><th colspan="2"> Add Cake Details </th></tr>
			<tr><td>Cake Name : </td><td><input type="text" name="cakename" size="20"></td></tr>
			<tr><td>Type : </td><td><input type="text" name="caketype" size="20"></td></tr>
			<tr><td>Price : </td><td><input type="text" name="cakePrice" size="20"></td></tr>
			<tr><td>Ratings : </td><td><input type="text" name="cakeratings" size="20"></td></tr>
			<tr><td colspan="2" align="center"><input type="file" name="image"></td></tr>
			<tr><td>Select Cake Maker : </td><td>
			<select onchange="myFunction()" name="opt">
				<option selected="selected" value="select">--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT cpname FROM cakeproducers";
					$result = $conn->query($sql);
	
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['cpname'] . "'>'" . $row['cpname'] . "'</option>";
						}
					}
					$conn->close();
				?>  
				
			</select>
			</td></tr>
			</table>
			</div>
			<div id="myDIV">
			<table border="0" cellspacing="10px" cellpadding="10px">
				<tr><td>Cake Producer Name : </td><td><input type="text" name="cpname" size="20"></td></tr>
				<tr><td>Address : </td><td><input type="text" name="cpaddress" size="20"></td></tr>
				<tr><td>Contact : </td><td><input type="text" name="cpcontact" pattern="[789][0-9]{9}" size="20"></td></tr>
			</table>
			</div>
			<button type="submit" name="upload">Submit</button>
		</form>
		</center>
</body>
</html>
