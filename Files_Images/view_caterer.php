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
		
		$sql = "SELECT Caid,Caname, Caaddress, Cacontact, CaPrice, Caratings, Caimages FROM caterer";
		$result = $conn->query($sql);
	
		if ($result->num_rows > 0) 
		{
			echo "<table cellspacing='10' cellpadding='10' border='0'>";
			echo "<tr><th colspan='3'><h3>CATERER</h3></th></tr>";
			while($row = $result->fetch_assoc()) 
			{
				$cid=$row['Caid'];
				echo "<tr><td colspan='3'><hr></td></tr>";
				echo "<tr><td rowspan='5'><img src='Caterer/".$row['Caimages']."' height='150px' width='300px'></td><td> Name : </td><td>".$row['Caname']."</td>";
				echo "<tr><td> Address : </td><td>".$row['Caaddress']."</td></tr>";
				echo "<tr><td> Contact : </td><td>".$row['Cacontact']."</td></tr>";
				echo "<tr><td> Price : </td><td> Rs. ".$row['CaPrice']."</td></tr>";
				echo "<tr><td> Ratings : </td><td>".$row['Caratings']."</td></tr>";
				echo "<tr><td> <a onClick=\"javascript: return confirm('ARE YOU SURE YOU WANT TO DELETE ?');\" 
							   href='Deletecaterer.php?Caid=$cid'>Delete</a></tr>";
			}
		}
		else 
		{
			echo "There are no vendors in caterer";
		}
		echo "</table>";
		$conn->close();
	?>
		
</body>
</html>