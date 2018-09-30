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

		$sql = "SELECT Mcid,Mcname, Mcaddress, Mccontact, McPrice, Mcratings, Mcimages FROM mc";
		$result = $conn->query($sql);
	
		
		if ($result->num_rows > 0) 
		{
			echo "<table cellspacing='10' cellpadding='10' border='0'>";
			echo "<tr><th colspan='3'><h3>MC</h3></th></tr>";
			while($row = $result->fetch_assoc()) 
			{
				$mid=$row['Mcid'];
				echo "<tr><td colspan='3'><hr></td></tr>";
				echo "<tr><td rowspan='5'><img src='MC/".$row['Mcimages']."' height='150px' width='300px'></td><td> Name : </td><td>".$row['Mcname']."</td>";
				echo "<tr><td> Address : </td><td>".$row['Mcaddress']."</td></tr>";
				echo "<tr><td> Contact : </td><td>".$row['Mccontact']."</td></tr>";
				echo "<tr><td> Price : </td><td> Rs. ".$row['McPrice']."</td></tr>";
				echo "<tr><td> Ratings : </td><td>".$row['Mcratings']."</td></tr>";
				echo "<tr><td> <a onClick=\"javascript: return confirm('ARE YOU SURE YOU WANT TO DELETE ?');\" 
							   href='DeleteMc.php? Mcid=$mid'>Delete</a></tr>";
			}
		}
		else 
		{
			echo "There are no vendors in MC"; 
		}
		echo "</table>";
		$conn->close();
	?>
		
</body>
</html>