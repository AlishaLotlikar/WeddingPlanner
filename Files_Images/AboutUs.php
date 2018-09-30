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
		
		$sql = "SELECT * FROM aboutus";
		$result = $conn->query($sql);
	
		
		if ($result->num_rows > 0) 
		{
			echo "<table cellspacing='10' cellpadding='10' border='0'>";
			echo "<tr><th colspan='3'><h1>ABOUT US</h1></th></tr>";
			while($row = $result->fetch_assoc()) 
			{
				$Aid=$row['Id'];
				echo "<tr><td colspan='3'><hr></td></tr>";
				echo "<tr><td rowspan='5'><img src='Details/".$row['Image']."' height='200px' width='150px'></td><td> Name : </td><td>".$row['Name']."</td>";
				echo "<tr><td> College : </td><td>".$row['College']."</td></tr>";
				echo "<tr><td> Contact : </td><td>".$row['Contact']."</td></tr>";
				echo "<tr><td> Email : </td><td>  ".$row['Email']."</td></tr>";
				/*echo "<tr><td> <a onClick=\"javascript: return confirm('ARE YOU SURE YOU WANT TO DELETE ?');\" 
							   href='DeleteDetail.php? Id=$Aid'>Delete</a></tr>";*/
				echo "<tr><td colspan='3'><br> <br> </td></tr>";
			}
		}
		echo "</table>";
		$conn->close();
	?>
		
</body>
</html>