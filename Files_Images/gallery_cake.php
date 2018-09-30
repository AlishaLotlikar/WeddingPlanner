<html>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$databasename = "weddingplanner";
		$conn = new mysqli($servername,$username,$password,$databasename)or die("Connection Failed : ".$conn->connect_error);
		
		$sql = "SELECT cakeimages, cakename FROM cake";
		$result = $conn->query($sql);
	
		echo "<table rowspan='5' colspan='5'>";
		echo "<tr><th>CAKE</th></tr>";
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				echo "<tr><td>".$row['cakename']."</td></tr>";
				echo "<tr><td><img src='Cake/".$row['cakeimages']."' height='300px' width='600px'></td></tr>";
				echo "<tr><td> &nbsp </td></tr>";
			}
		}
		else 
		{
			echo "There are no images";
		}
		echo "</table>";
		$conn->close();
	?>
		
</body>
</html>