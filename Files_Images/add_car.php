<html>
<?php
	$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
	$msg = "";
	if (isset($_POST['upload'])) 
	{
		$target = "Car/".basename($_FILES['image']['name']);

		$CType= $_POST['CType'];
		$COno= $_POST['COno'];
		$CPrice= $_POST['CPrice'];
		$Cratings= $_POST['Cratings'];
		$image = $_FILES['image']['name'];
		$COname=$_POST['COname'];
		$COaddress=$_POST['COaddress'];
		$COcontact=$_POST['COcontact'];
		
		if($_POST['opt']=='select')
		{
			$sql = "INSERT INTO carowner(COname, COaddress, COcontact)VALUES('$COname', '$COaddress', '$COcontact')";
			$conn->query($sql);
			$sql = "SELECT COid FROM carowner where COname='$COname'";
			$result=$conn->query($sql);
			while($row = $result->fetch_assoc()) 
			{
				$sql = "INSERT INTO car (CType, COno, CPrice, Cratings, Cimages, COid)VALUES ('$CType', '$COno', '$CPrice','$Cratings', '$image', '{$row['COid']}')";
			}
		}
		else
		{ 	
			$sql = "SELECT COid FROM carowner where COname='$_POST[opt]'";
			$result=$conn->query($sql);
			while($row = $result->fetch_assoc()) 
			{
				$sql = "INSERT INTO car (CType, COno, CPrice, Cratings, Cimages, COid)VALUES ('$CType', '$COno', '$CPrice','$Cratings', '$image', '{$row['COid']}')";
				
			}
		}
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
		<form method="post" action="add_car.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<tr><th colspan="2"> Add Car Details </th></tr>
			<tr><td>Car Type : </td><td><input type="text" name="CType" size="20"></td></tr>
			<tr><td>Car Number : </td><td><input type="text" name="COno" size="20"></td></tr>
			<tr><td>Price : </td><td><input type="text" name="CPrice" size="20"></td></tr>
			<tr><td>Ratings : </td><td><input type="text" name="Cratings" size="20"></td></tr>
			<tr><td colspan="2" align="center"><input type="file" name="image"></td></tr>
			<tr><td>Select Car Owner : </td><td>
			<select onchange="myFunction()" name="opt">
				<option selected="selected" value="select">--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT COname FROM carowner";
					$result = $conn->query($sql);
	
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['COname'] . "'>'" . $row['COname'] . "'</option>";
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
				<tr><td>Owner Name : </td><td><input type="text" name="COname" size="20"></td></tr>
				<tr><td>Address : </td><td><input type="text" name="COaddress" size="20"></td></tr>
				<tr><td>Contact : </td><td><input type="text" name="COcontact" pattern="[789][0-9]{9}" size="20"></td></tr>
			</table>
			</div>
			<button type="submit" name="upload">Submit</button>
		</form>
		</center>
</body>
</html>
