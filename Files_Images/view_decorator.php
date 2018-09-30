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

		$sql = "SELECT Did, Dname, DOaddress, DContact, DPrice, Dratings, Dimages FROM decorator";
		$result = $conn->query($sql);
	
		if ($result->num_rows > 0) 
		{
			echo "<table cellspacing='10' cellpadding='10' border='0'>";
			echo "<tr><th colspan='3'><h3>DECORATOR</h3></th></tr>";
			while($row = $result->fetch_assoc()) 
			{
				$did=$row['Did'];
				echo "<tr><td colspan='3'><hr></td></tr>";
				echo "<tr><td rowspan='5'><img src='Decorator/".$row['Dimages']."' height='150px' width='300px'></td><td> Name : </td><td>".$row['Dname']."</td>";
				echo "<tr><td> Address : </td><td>".$row['DOaddress']."</td></tr>";
				echo "<tr><td> Contact : </td><td>".$row['DContact']."</td></tr>";
				echo "<tr><td> Price : </td><td> Rs. ".$row['DPrice']."</td></tr>";
				echo "<tr><td> Ratings : </td><td>".$row['Dratings']."</td></tr>";
				echo "<tr><td> <a onClick=\"javascript: return confirm('ARE YOU SURE YOU WANT TO DELETE ?');\" 
							   href='DeleteDecorator.php? Did=$did'>Delete</a></tr>";
			}
		}
		else 
		{
			echo "There are no vendors in Decorator";
		}
		echo "</table>";
		$conn->close();
	?>
		
</body>
</html>