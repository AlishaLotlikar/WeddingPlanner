<html>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$databasename = "weddingplanner";
		$conn = new mysqli($servername,$username,$password,$databasename)or die("Connection Failed : ".$conn->connect_error);
		
		$sql = "SELECT himages, hname FROM hall";
		$result = $conn->query($sql);
	
		echo "<table rowspan='5' colspan='5'>";
		echo "<tr><th>HALL</th></tr>";
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				echo "<tr><td>".$row['hname']."</td></tr>";
				echo "<tr><td><img src='Hall/".$row['himages']."' height='300px' width='600px'></td></tr>";
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