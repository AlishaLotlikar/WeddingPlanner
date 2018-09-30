<html>
<head>
<style>
	td
	{
		font-size: 12px;
	}
</style>
</head>
<body>
	<?php
		$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);

		$sql = "SELECT c.Cid,c.CType, c.COno, c.CPrice, c.Cratings, c.Cimages, co.COname, co.COaddress, co.COcontact FROM car c, carowner co where c.COid=co.COid";
		$result = $conn->query($sql);
	
		if ($result->num_rows > 0) 
		{
			echo "<table cellspacing='10' cellpadding='10' border='0'>";
			echo "<tr><th colspan='3'><h3>CAR</h3></th></tr>";
			while($row = $result->fetch_assoc()) 
			{
				$cid=$row['Cid'];
				echo "<tr><td colspan='3'><hr></td></tr>";
				echo "<tr><td rowspan='7'><img src='Car/".$row['Cimages']."' height='150px' width='300px'></td><td> Type : </td><td>".$row['CType']."</td>";
				echo "<tr><td> Car No. : </td><td>".$row['COno']."</td></tr>";
				echo "<tr><td> Price : </td><td> Rs. ".$row['CPrice']."</td></tr>";
				echo "<tr><td> Owner Name : </td><td>".$row['COname']."</td></tr>";
				echo "<tr><td> Address : </td><td>".$row['COaddress']."</td></tr>";
				echo "<tr><td> Contact : </td><td>".$row['COcontact']."</td></tr>";
				echo "<tr><td> Ratings : </td><td>".$row['Cratings']."</td></tr>";
				echo "<tr><td> <a onClick=\"javascript: return confirm('ARE YOU SURE YOU WANT TO DELETE ?');\" 
							   href='DeleteCar.php? Cid=$cid'>Delete</a></tr>";
			}
		}
		else 
		{
			echo "There are no vendors in Car";
		}
		echo "</table>";
		$conn->close();
	?>
		
</body>
</html>