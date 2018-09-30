<html>
<?php
	$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
	if (isset($_POST['upload'])) 
	{
		$Hid=$_POST['opt6'];
		$Cid=$_POST['opt7'];
		$Did=$_POST['opt5'];
		$Caid=$_POST['opt4'];
		$djid=$_POST['opt2'];
		$Mcid=$_POST['opt3'];
		$bandid=$_POST['opt1'];	
		$cakid=$_POST['opt8'];

		
		$sql="INSERT INTO package(PckgType)VALUES('Platinum')";
		//$conn->query($sql);
		if (mysqli_query($conn, $sql)) 
		{
			$last_id = mysqli_insert_id($conn);
			$sql="INSERT INTO platinumpackage(Pckgid, Hid, Cid, Did, Caid, djid, Mcid, bandid, cakid)VALUES
			('$last_id',	'$Hid',	'$Cid',	'$Did',	'$Caid', '$djid', '$Mcid', '$bandid', '$cakid')";
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		if ($conn->query($sql) === TRUE) 
		{
			echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
		} 
		else 
		{
			echo "<script type='text/javascript'>alert('Failed!')</script>";
			$sql="DELETE FROM package WHERE Packgid='$last_id'";
			mysqli_query($conn, $sql);
		}
	}
	
?>
	<head>
	</head>
	<body>
		<center><h1> Platinum Package </h1></center>
		<hr>
		<form method="post" action="platinum_pack.php">
			<table cellspacing="5" cellpadding="5">
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>Band : </td>
			<td><select name="opt1" style="width:200px">
				<option selected="selected" value="select1" disabled>--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT bandid, bandname, bandPrice FROM band";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['bandid'] . "'>'".$row['bandname'].", Rs. ".$row['bandPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			<tr><td colspan="4"> <hr> </td></tr>
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>DJ : </td>
			<td><select name="opt2" style="width:200px">
				<option selected="selected" value="select2" disabled>--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT djid, djname, djPrice FROM dj";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['djid'] . "'>'".$row['djname'].", Rs. ".$row['djPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			<tr><td colspan="4"><hr></td></tr>
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>MC : </td>
			<td><select name="opt3" style="width:200px">
				<option selected="selected" value="select3" disabled>--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT mcid, mcname, mcPrice FROM mc";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['mcid'] . "'>'".$row['mcname'].", Rs. ".$row['mcPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			<tr><td colspan="4"><hr></td></tr>
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>Caterer : </td>
			<td><select name="opt4" style="width:200px">
				<option selected="selected" value="select4" disabled>--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT caid, caname, caPrice FROM caterer";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['caid'] . "'>'".$row['caname'].", Rs. ".$row['caPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			<tr><td colspan="4"><hr></td></tr>
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>Decorator : </td>
			<td><select name="opt5" style="width:200px">
				<option selected="selected" value="select5" disabled>--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT did, dname, dPrice FROM decorator";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['did'] . "'>'".$row['dname'].", Rs. ".$row['dPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			<tr><td colspan="4"><hr></td></tr>
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>Hall : </td>
			<td><select name="opt6" style="width:200px">
				<option selected="selected" value="select6" disabled>--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT Hid, Hname, HPrice FROM hall";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['Hid'] . "'>'".$row['Hname'].", Rs. ".$row['HPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			<tr><td colspan="4"><hr></td></tr>
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>Car : </td>
			<td><select name="opt7" style="width:200px">
				<option selected="selected" value="select7" disabled>--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT Cid, CType, CPrice FROM car";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['Cid'] . "'>'".$row['CType'].", Rs. ".$row['CPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			<tr><td colspan="4"><hr></td></tr>
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>Cake : </td>
			<td><select name="opt8" style="width:200px">
				<option selected="selected" value="select8" disabled>--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT cakeid, cakename, cakePrice FROM cake";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['cakeid'] . "'>'".$row['cakename'].", Rs. ".$row['cakePrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			</table>
			<hr>
			<tr><td colspan="4"><center><br><button type="submit" name="upload">ADD</button></center></td></tr>
		</form>
	</body>
</html>