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

		$sql = "SELECT c.cakeid,c.cakename, c.caketype, c.cakePrice, c.cakeratings, c.cakeimages, cp.cpname, cp.cpaddress, cp.cpcontact FROM cake c, cakeproducers cp where c.cpid=cp.cpid";
		$result = $conn->query($sql);
	
		if ($result->num_rows > 0) 
		{
			echo "<table cellspacing='10' cellpadding='10' border='0'>";
			echo "<tr><th colspan='3'><h3>CAKE</h3></th></tr>";
			while($row = $result->fetch_assoc()) 
			{
				$Cid=$row['cakeid'];
				echo "<tr><td colspan='3'><hr></td></tr>";
				echo "<tr><td rowspan='7'><img src='Cake/".$row['cakeimages']."' height='150px' width='300px'></td><td> Cake Name : </td><td>".$row['cakename']."</td>";
				echo "<tr><td> Type : </td><td>".$row['caketype']."</td></tr>";
				echo "<tr><td> Price : </td><td> Rs. ".$row['cakePrice']."</td></tr>";
				echo "<tr><td> Cake Producer : </td><td>".$row['cpname']."</td></tr>";
				echo "<tr><td> Address : </td><td>".$row['cpaddress']."</td></tr>";
				echo "<tr><td> Contact : </td><td>".$row['cpcontact']."</td></tr>";
				echo "<tr><td> Ratings : </td><td>".$row['cakeratings']."</td></tr>";
				echo "<tr><td> <a onClick=\"javascript: return confirm('ARE YOU SURE YOU WANT TO DELETE ?');\" 
							   href='DeleteCake.php? cakeid=$Cid'>Delete</a></tr>";
			}
		}
		else 
		{
			echo "There are no vendors in Cake";
		}
		echo "</table>";
		$conn->close();
	?>
		
</body>
</html>