<html>
<body>
	<table cellspacing="5" cellpadding="5" align="center">
		<?php
		session_start();
		$customer=$_SESSION['username'];
			$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
			
			$qry="select Uid from user where Uemail='$customer'";
			$r1 = mysqli_query($conn,$qry);
			$r2 = mysqli_fetch_assoc($r1);
			$cuid=$r2['Uid'];
			
			$total=0;
			$sql1="select Customer_ID,type, name, price,booked_date from cart where Customer_ID='$cuid'";
			
			$result = $conn->query($sql1);
			if ($result->num_rows > 0) 
			{	
				echo "<tr><th colspan='7'>Cart</th></tr>";
				echo "<tr><td colspan='7'><hr></td></tr>";
				echo "<tr><th>Customer ID</th><th> Type </th><td>|</td><th> Name </th><td>|</td><th> Price </th><th> Booking Date </th></tr>";
				echo "<tr><td colspan='7'><hr></td></tr>";
				while($row = $result->fetch_assoc()) 
				{
					echo "<tr><td>".$row['Customer_ID']."</td><td> ".$row['type']." </td><td>|</td><td> ".$row['name']." </td><td>|</td><td> Rs.".$row['price']." </td><td>".$row['booked_date']."</td></tr>";
					$total=$total+$row['price'];
				}
				echo "<tr><td colspan='7'><hr></td></tr>";
				echo "<tr><th colspan='7'>Total = Rs. ".$total."</th></tr>";
				echo "<tr><td colspan='7'><hr></td></tr>";
				echo "<tr><th colspan='2'><form method='post' action='check_out.html'><button type='submit' name='pay'>Check Out</button></form></th>
				<th> &nbsp </th>
				<th colspan='2'><form method='post' action='delete.php?cust=$cuid'><button type='submit' name='delete'>Delete</button></form></th</tr>";
			}
			else
			{
				echo "Cart is empty";
			}
			
		?>
	</table>
	</form>
</body>
</html>