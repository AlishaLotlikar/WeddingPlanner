<html>
<?php
	$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
	$msg = "";
	if (isset($_POST['upload'])) 
	{
		
		$target = "Hall/".basename($_FILES['image']['name']);
		$Hname= $_POST['Hname'];
		$Haddress= $_POST['Haddress'];
		$Hprice= $_POST['Hprice'];
		$Hratings= $_POST['Hratings'];
		$image = $_FILES['image']['name'];
		
		$HOname=$_POST['HOname'];
		$HOaddress=$_POST['HOaddress'];
		$HOcontact=$_POST['HOcontact'];
		
		$option=$_POST['opt'];
		
		if($option=='select')
		{
			$sql1 = "INSERT INTO hallowner(HOname, HOaddress, HOcontact) VALUES ('$HOname', '$HOaddress', '$HOcontact')";
			$conn->query($sql1);
			$sql2 = "SELECT HOid FROM hallowner where HOname='$HOname'";
			$result=$conn->query($sql2);
			while($row = $result->fetch_assoc()) 
			{
				$sql3 = "INSERT INTO hall (Hname, Haddress, HPrice, Hratings, Himages, HOid) VALUES ('$Hname', '$Haddress', '$Hprice','$Hratings', '$image', '{$row['HOid']}')";
			}
		}
		else
		{ 
			$sql2 = "SELECT HOid FROM hallowner where HOname='$option'";
			$result=$conn->query($sql2);
			while($row = $result->fetch_assoc()) 
			{
				$sql3 = "INSERT INTO hall (Hname, Haddress, HPrice, Hratings, Himages, HOid) VALUES ('$Hname', '$Haddress', '$Hprice','$Hratings', '$image', '{$row['HOid']}')";
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
		<form method="post" action="add_hall.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<tr><th colspan="2"> Add Hall Details </th></tr>
			<tr><td>Hall Name : </td><td><input type="text" name="Hname" size="20"></td></tr>
			<tr><td>Address : </td><td><input type="text" name="Haddress" size="20"></td></tr>
			<tr><td>Price : </td><td><input type="text" name="Hprice" size="20"></td></tr>
			<tr><td>Ratings : </td><td><input type="text" name="Hratings" size="20"></td></tr>
			<tr><td colspan="2" align="center"><input type="file" name="image"></td></tr>
			<tr><td>Select Hall Owner : </td><td>
			<select onchange="myFunction()" name="opt">
				<option selected="selected" value="select">--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT HOname FROM hallowner";
					$result = $conn->query($sql);
	
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['HOname'] . "'>" . $row['HOname'] . "</option>";
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
				<tr><td>Owner Name : </td><td><input type="text" name="HOname" size="20"></td></tr>
				<tr><td>Address : </td><td><input type="text" name="HOaddress" size="20"></td></tr>
				<tr><td>Contact : </td><td><input type="text" name="HOcontact" pattern="[789][0-9]{9}" size="20"></td></tr>
			</table>
			</div>
			<button type="submit" name="upload">Submit</button>
		</form>
		</center>
</body>
</html>
