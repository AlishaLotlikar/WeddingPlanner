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

		$sql = "SELECT h.Hid,h.Hname, h.Haddress, h.HPrice, h.Hratings, h.Himages, ho.HOname, ho.HOaddress, ho.HOcontact FROM hall h, hallowner ho where h.HOid=ho.HOid";
		$result = $conn->query($sql);
	
		if ($result->num_rows > 0) 
		{
			echo "<table cellspacing='10' cellpadding='10' border='0'>";
			echo "<tr><th colspan='3'><h3>HALL</h3></th></tr>";
			while($row = $result->fetch_assoc()) 
			{
				$hid=$row['Hid'];
				echo "<tr><td colspan='3'><hr></td></tr>";
				echo "<tr><td rowspan='7'><img src='Hall/".$row['Himages']."' height='150px' width='300px'></td><td> Name : </td><td>".$row['Hname']."</td>";
				echo "<tr><td> Location : </td><td>".$row['Haddress']."</td></tr>";
				echo "<tr><td> Price : </td><td> Rs. ".$row['HPrice']."</td></tr>";
				echo "<tr><td> Owner Name : </td><td>".$row['HOname']."</td></tr>";
				echo "<tr><td> Address : </td><td>".$row['HOaddress']."</td></tr>";
				echo "<tr><td> Contact : </td><td>".$row['HOcontact']."</td></tr>";
				echo "<tr><td> Ratings : </td><td>".$row['Hratings']."</td></tr>";
				echo "<tr><td> <a onClick=\"javascript: return confirm('ARE YOU SURE YOU WANT TO DELETE ?');\" 
							   href='DeleteHall.php? Hid=$hid'>Delete</a></tr>";
			}
		}
		else 
		{
			echo "There are no vendors in Hall";
		}
		echo "</table>";
		$conn->close();
	?>
		
</body>
</html>