<html>

<body>
	<center><h2>Platinum Package</h2></center>
	<form method="post" action="cart.php">
	<table cellspacing="5" cellpadding="5">
	<?php 
		$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
		$sql = "SELECT b.bandname, cake.cakename, car.CType, c.Caname, d.Dname, dj.djname, h.Hname, mc.Mcname, g.pckgid from platinumpackage g, band b, cake, car, caterer c, decorator d, dj, hall h, mc where g.Hid=h.Hid and g.Cid=car.Cid and g.Did=d.did and g.Caid=c.Caid and g.djid=dj.djid and g.Mcid=mc.Mcid and g.bandid=b.bandid and g.cakid=cake.cakeid";

		$i=1;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				$pckgid=$row['pckgid'];	
				echo "<tr><th colspan='2'> Platinum Package : ".$i."</th><th rowspan='9'><a href=cart.php?id=".$pckgid.">Add to Cart</a></th></tr>";
				echo "<tr><td>Band : </td><td>".$row['bandname']."</td></tr>";
				echo "<tr><td>Cake : </td><td>".$row['cakename']."</td></tr>";
				echo "<tr><td>Car : </td><td>".$row['CType']."</td></tr>";
				echo "<tr><td>Caterer : </td><td>".$row['Caname']."</td></tr>";
				echo "<tr><td>Decorator : </td><td>".$row['Dname']."</td></tr>";
				echo "<tr><td>DJ : </td><td>".$row['djname']."</td></tr>";
				echo "<tr><td>Hall : </td><td>".$row['Hname']."</td></tr>";
				echo "<tr><td>MC : </td><td>".$row['Mcname']."</td></tr>";
				echo "<tr><td colspan='3'><hr></td></tr>";
				$i=$i+1;
			}
		}
		$conn->close();
	?>
	</table>
	</form>
</body>
</html>