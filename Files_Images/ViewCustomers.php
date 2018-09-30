<html>
<head>
	<style>
		table {
			width:80%;
		}
		table, th, td {
			border: 3px solid #f1f1f1;
			border-collapse: collapse;
		}
		th, td {
			padding: 15px;
			text-align: center;
		}
		th {
			background-color: #c0c0c0;
			color: white;
		}
		tr:hover{background-color:#f5f5f5}
		button {
			background-color:  #32CD32;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 33%;
		}

		button:hover {
			opacity: 0.8;
		}button {
			background-color:  #c0c0c0;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 33%;
		}

		button1:hover {
			opacity: 0.8;
		}
		button1:hover {
			opacity: 0.8;
		}button1 {
			background-color:  #c0c0c0;
			color: white;
			padding: 8px 14px;
			margin: 4px 0;
			border: none;
			cursor: pointer;
			width: 33%;
		}

	</style
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "weddingplanner";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM user ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<center><h1>CUSTOMERS</h1>";
    echo "<table><tr><th>USER ID</th><th>USER NAME</th><th>USER CONTACT</th><th>USER EMAIL</th><th></th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$Uid=$row["Uid"];
        echo "<tr>
			  <td>" . $row["Uid"]. "</td>
			  <td>" . $row["Ufirstname"]. " " . $row["Ulastname"]. "</td>
			  <td>" . $row["UContact"]. "</td> 
			  <td>" . $row["Uemail"]. "</td> 
			  <td><a onClick=\"javascript: return confirm('ARE YOU SURE YOU WANT TO DELETE THIS CUSTOMER?');\" href='DeleteCustomer.php? Uid=$Uid'>Delete</a></td>
			  </tr>";
    }
    echo "</table></center>";
} else {
    echo "0 results";
}

$conn->close();
?> 
<form action="admin.html" target="_top" method = "POST">
			<center>
			<br><br>
			<button type ="submit" name="submit" value="HOME PAGE"> BACK </button>
			</center>
</form>

</body>
</html>