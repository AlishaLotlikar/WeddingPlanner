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
		
		$sql = "SELECT * FROM dj";
		$result = $conn->query($sql);
	
		
		if ($result->num_rows > 0) 
		{
			echo "<table cellspacing='10' cellpadding='10' border='0'>";
			echo "<tr><th colspan='3'><h3>DJ</h3></th></tr>";
			while($row = $result->fetch_assoc()) 
			{
				$Djid=$row['djid'];
				echo "<tr><td colspan='3'><hr></td></tr>";
				echo "<tr><td rowspan='5'><img src='DJ/".$row['djimages']."' height='150px' width='300px'></td><td> Name : </td><td>".$row['djname']."</td>";
				echo "<tr><td> Address : </td><td>".$row['djaddress']."</td></tr>";
				echo "<tr><td> Contact : </td><td>".$row['djcontact']."</td></tr>";
				echo "<tr><td> Price : </td><td> Rs. ".$row['djPrice']."</td></tr>";
				echo "<tr><td> Ratings : </td><td>".$row['djratings']."</td></tr>";
				echo "<tr><td> <a onClick=\"javascript: return confirm('ARE YOU SURE YOU WANT TO DELETE ?');\" 
							   href='DeleteDJ.php? djid=$Djid'>Delete</a></tr>";
			}
		}
		else 
		{
			echo "There are no vendors in DJ";
		}
		echo "</table>";
		$conn->close();
	?>
		
</body>
</html>