<html>
<head>
<style>
	table {
		width:100%;
	}
	table, th, td {
		border: 3px solid #f1f1f1;
		border-collapse: collapse;
	}
	th, td {
		padding: 15px;
		text-align: left;
	}
	th {
		background-color: #c0c0c0;
		color: white;
	}
	tr:hover{background-color:#f5f5f5}
	
		button:hover {
			opacity: 0.8;
		}button {
			background-color:   #c0c0c0;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 33%;
		}

		button:hover {
			opacity: 0.8;
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

	$sql = "SELECT * FROM PLANNER";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo "<center><h1>PLANNERS</h1>";
		echo "<table><tr><tr><th>PLANNER ID</th><th>PLANNER NAME</th><th>PLANNER CONTACT</th><th>PLANNER EMAIL</th><th></th></tr>";
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$Pid=$row["Pid"];
			echo "<tr><td>" . $row["Pid"]. "</td>
				  <td>" . $row["Pfirstname"]. " " . $row["Plastname"]. "</td>
				  <td>" . $row["Pcontact"]. "</td><td>" . $row["Pemail"]. "</td>
				  <td><a onClick=\"javascript: return confirm('ARE YOU SURE YOU WANT TO DELETE THIS PLANNER?');\" 
						 href='DeletePlanner.php? Pid=$Pid'>Delete</a></td>
				  </tr>";
		}
		echo "</table></center>";
	} 
	else {
		echo "0 results";
	}

	$conn->close();
	?> 
	<br><br>
	<form action="InsertPlanner.html" method = "POST">
				<center>
				<button type ="submit" name="submit" value="INSERT DATA"> NEW PLANNER </button>
				</center>
	</form>
	<form action="admin.html" target="_top" method = "POST">
				<center>
				<button type ="submit" name="submit" value="HOME PAGE"> BACK </button>
				</center>
	</form>
</body>
</html>