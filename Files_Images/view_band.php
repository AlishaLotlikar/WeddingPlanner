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
		
		$sql = "SELECT bandid,bandname, bandaddress, bandcontact, bandPrice, bandratings, bandImages FROM band";
		$result = $conn->query($sql);
	
		
		if ($result->num_rows > 0) 
		{
			echo "<table cellspacing='10' cellpadding='10' border='0'>";
			echo "<tr><th colspan='3'><h3>BAND</h3></th></tr>";
			while($row = $result->fetch_assoc()) 
			{
				$Bid=$row['bandid'];
				echo "<tr><td colspan='3'><hr></td></tr>";
				echo "<tr><td rowspan='5'><img src='Band/".$row['bandImages']."' height='150px' width='300px'></td><td> Name : </td><td>".$row['bandname']."</td>";
				echo "<tr><td> Address : </td><td>".$row['bandaddress']."</td></tr>";
				echo "<tr><td> Contact : </td><td>".$row['bandcontact']."</td></tr>";
				echo "<tr><td> Price : </td><td> Rs. ".$row['bandPrice']."</td></tr>";
				echo "<tr><td> Ratings : </td><td>".$row['bandratings']."</td></tr>";
				echo "<tr><td> <a onClick=\"javascript: return confirm('ARE YOU SURE YOU WANT TO DELETE ?');\" 
							   href='DeleteBand.php? bandid=$Bid'>Delete</a></tr>";
			}
		}
		else 
		{
			echo "There are no vendors in band";
		}
		echo "</table>";
		$conn->close();
	?>
		
</body>
</html>