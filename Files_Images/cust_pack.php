<html>
<?php
session_start();
 $u=$_SESSION['username'];
	$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
	
	$qry="select Uid from user where Uemail='$u'";
	$r1 = mysqli_query($conn,$qry);
	$r2 = mysqli_fetch_assoc($r1);
	$cuid=$r2['Uid'];
	
	if (isset($_POST['upload'])) 
	{
		$i=0;
		$k=0;
		$bandid=mysqli_real_escape_string($conn, $_POST['opt1']);
		$djid=mysqli_real_escape_string($conn, $_POST['opt2']);
		$mcid=mysqli_real_escape_string($conn, $_POST['opt3']);
		$caid=mysqli_real_escape_string($conn, $_POST['opt4']);
		$did=mysqli_real_escape_string($conn, $_POST['opt5']);
		$hid=mysqli_real_escape_string($conn, $_POST['opt6']);
		$cid=mysqli_real_escape_string($conn, $_POST['opt7']);
		$cakeid=mysqli_real_escape_string($conn, $_POST['opt8']);
		$date=date('y-m-d',strtotime($_POST['date']));
		
		
		
		
		$sql="select bandname, bandPrice from band where bandid='$bandid'";
		$res = $conn->query($sql);
		if ($res-> num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$s="select type from cart where type='band'";
				$r = $conn->query($s);
				if ($r->num_rows < 0) 
				{
					$k=$k+1;
					echo "<script type='text/javascript'>alert('Either Band Already booked on that date or You cannot add more than one band in the cart')</script>";
				}
				else
				{
					$checkdate="select booked_date, type from cart where type='band'";
					$cd=mysqli_query($conn,$checkdate);
					$cd1=mysqli_fetch_assoc($cd);
					$bkdate=date('y-m-d',strtotime($cd1['booked_date']));
					
					if($res-> num_rows > 0){ 
									
								if($bkdate==$date){echo "<script type='text/javascript'>alert('Band Already booked on that date')</script>";} else{
					$sql="INSERT INTO cart (Customer_ID,id, name, type, price,booked_date)VALUES('$cuid','$bandid', '$row[bandname]', 'band', '$row[bandPrice]','$date')";
					$conn->query($sql);
					$i=$i+1;}}
				}
			}
		}
		
		$sql="select cakename, cakePrice from cake where cakeid='$cakeid'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$s="select booked_date,type from cart where type='cake'";
				$r = $conn->query($s);
				if ($r->num_rows < 0) 
				{
					$k=$k+1;
					echo "<script type='text/javascript'>alert('Either Cake Already booked on that date or You cannot add more than one cake in the cart')</script>";
				}
				else
				{
					$checkdate="select booked_date, type from cart where type='cake'";
					$cd=mysqli_query($conn,$checkdate);
					$cd1=mysqli_fetch_assoc($cd);
					$bkdate=date('y-m-d',strtotime($cd1['booked_date']));
					if($res-> num_rows > 0){ 
									
								if($bkdate==$date){echo "<script type='text/javascript'>alert('Cake Already booked on that date')</script>";} else{
					$sql="INSERT INTO cart (Customer_ID,id, name, type, price,booked_date)VALUES('$cuid','$cakeid', '$row[cakename]', 'cake', '$row[cakePrice]','$date')";
					$conn->query($sql);
					$i=$i+1;}}
				}
			}
		}
				
		$sql="select CType, CPrice from car where Cid='$cid'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$s="select booked_date,type from cart where type='car'";
				$r = $conn->query($s);
				if ($r->num_rows < 0) 
				{
					$k=$k+1;
					echo "<script type='text/javascript'>alert('Either Car Already booked on that date orYou cannot add more than one car in the cart')</script>";
				}
				else
				{
					$checkdate="select booked_date, type from cart where type='car'";
					$cd=mysqli_query($conn,$checkdate);
					$cd1=mysqli_fetch_assoc($cd);
					$bkdate=date('y-m-d',strtotime($cd1['booked_date']));
					if($res-> num_rows > 0){ 
									
								if($bkdate==$date){echo "<script type='text/javascript'>alert('Car Already booked on that date')</script>";} else{
					$sql="INSERT INTO cart (Customer_ID,id, name, type, price,booked_date)VALUES('$cuid','$cid', '$row[CType]', 'car', '$row[CPrice]','$date')";
					$conn->query($sql);
					$i=$i+1;}}
				}
			}
		}
				
		$sql="select Caname, CaPrice from caterer where Caid='$caid'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$s="select booked_date,type from cart where type='caterer'";
				$r = $conn->query($s);
				if ($r->num_rows < 0) 
				{
					$k=$k+1;
					echo "<script type='text/javascript'>alert('Either Caterer Already booked on that date orYou cannot add more than one caterer in the cart')</script>";
				}
				else
				{
					
					$checkdate="select booked_date, type from cart where type='caterer'";
					$cd=mysqli_query($conn,$checkdate);
					$cd1=mysqli_fetch_assoc($cd);
					$bkdate=date('y-m-d',strtotime($cd1['booked_date']));
					if($res-> num_rows > 0){ 
									
								if($bkdate==$date){echo "<script type='text/javascript'>alert('Caterer Already booked on that date')</script>";} else{
					$sql="INSERT INTO cart (Customer_ID,id, name, type, price,booked_date)VALUES('$cuid','$caid', '$row[Caname]', 'caterer', '$row[CaPrice]','$date')";
					$conn->query($sql);
					$i=$i+1;}}
				}
			}
		}
				
		$sql="select dname, DPrice from decorator where did='$did'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$s="select booked_date,type from cart where type='decorator'";
				$r = $conn->query($s);
				if ($r->num_rows < 0) 
				{
					$k=$k+1;
					echo "<script type='text/javascript'>alert('Either Decorator Already booked on that date orYou cannot add more than one decorator in the cart')</script>";
				}
				else
				{
					
					$checkdate="select booked_date, type from cart where type='decorator'";
					$cd=mysqli_query($conn,$checkdate);
					$cd1=mysqli_fetch_assoc($cd);
					$bkdate=date('y-m-d',strtotime($cd1['booked_date']));
					if($res-> num_rows > 0){ 
									
								if($bkdate==$date){echo "<script type='text/javascript'>alert('Decorator Already booked on that date')</script>";} else{
					$sql="INSERT INTO cart (Customer_ID,id, name, type, price,booked_date)VALUES('$cuid','$did', '$row[dname]', 'decorator', '$row[DPrice]','$date')";
					$conn->query($sql);
					$i=$i+1;}}
				}
			}
		}
				
		$sql="select djname, djPrice from dj where djid='$djid'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$s="select booked_date,type from cart where type='dj'";
				$r = $conn->query($s);
				if ($r->num_rows < 0) 
				{
					$k=$k+1;
					echo "<script type='text/javascript'>alert('Either DJ Already booked on that date or You cannot add more than one DJ in the cart')</script>";
				}
				else
				{
					
					$checkdate="select booked_date, type from cart where type='dj'";
					$cd=mysqli_query($conn,$checkdate);
					$cd1=mysqli_fetch_assoc($cd);
					$bkdate=date('y-m-d',strtotime($cd1['booked_date']));
					if($res-> num_rows > 0){ 
									
								if($bkdate==$date){echo "<script type='text/javascript'>alert('DJ Already booked on that date')</script>";} else{
					$sql="INSERT INTO cart (Customer_ID,id, name, type, price,booked_date)VALUES('$cuid','$djid', '$row[djname]', 'dj', '$row[djPrice]','$date')";
					$conn->query($sql);
					$i=$i+1;}}
				}
			}
		}
				
		$sql="select hname, HPrice from hall where hid='$hid'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$s="select booked_date,type from cart where type='hall'";
				$r = $conn->query($s);
				if ($r->num_rows < 0) 
				{
					$k=$k+1;
					echo "<script type='text/javascript'>alert('Either Hall Already booked on that date or You cannot add more than one hall in the cart')</script>";
				}
				else
				{
					$checkdate="select booked_date, type from cart where type='hall'";
					$cd=mysqli_query($conn,$checkdate);
					$cd1=mysqli_fetch_assoc($cd);
					$bkdate=date('y-m-d',strtotime($cd1['booked_date']));
					if($res-> num_rows > 0){ 
									
								if($bkdate==$date){echo "<script type='text/javascript'>alert('Hall Already booked on that date')</script>";} else{
					$sql="INSERT INTO cart (Customer_ID,id, name, type, price,booked_date)VALUES('$cuid','$hid', '$row[hname]', 'hall', '$row[HPrice]','$date')";
					$conn->query($sql);
					$i=$i+1;}}
				}
			}
		}
				
		$sql="select mcname, mcPrice from mc where mcid='$mcid'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$s="select booked_date,type from cart where type='mc'";
				$r = $conn->query($s);
				if ($r->num_rows < 0) 
				{
					$k=$k+1;
					echo "<script type='text/javascript'>alert('Either MC Already booked on that date or You cannot add more than one mc in the cart')</script>";
				}
				else
				{
					$checkdate="select booked_date, type from cart where type='mc'";
					$cd=mysqli_query($conn,$checkdate);
					$cd1=mysqli_fetch_assoc($cd);
					$bkdate=date('y-m-d',strtotime($cd1['booked_date']));
					if($res-> num_rows > 0){ 
									
								if($bkdate==$date){echo "<script type='text/javascript'>alert('MC Already booked on that date')</script>";} else{
					$sql="INSERT INTO cart (Customer_ID,id, name, type, price,booked_date)VALUES('$cuid','$mcid', '$row[mcname]', 'mc', '$row[mcPrice]','$date')";
					$conn->query($sql);
					$i=$i+1;}}
				}
			}
		}
		if($i>0)
		{
			echo "<script type='text/javascript'>alert('Added Successfully!')</script>";
		}
		elseif(!($k>0))
		{
			echo "<script type='text/javascript'>alert('No vendors were selected!')</script>";
		}
		$conn->close();
	}
	
?>
	<head>
	</head>
	<body>
		<center><h1> Customer Package </h1></center>
		<hr>
		<form method="post" action="cust_pack.php">
			<table cellspacing="5" cellpadding="5">
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>Band : </td>
			<td><select name="opt1" style="width:200px">
				<option selected="selected" name="1000">--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT bandid, bandname, bandPrice FROM band";
					$result = $conn->query($sql);
					$bid="";
					if ($result->num_rows > 0) 
					{
						
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['bandid'] . "'>'".$row['bandname'].", Rs. ".$row['bandPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
		
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>DJ : </td>
			<td><select name="opt2" style="width:200px">
				<option selected="selected" name="1000">--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT djid, djname, djPrice FROM dj";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['djid'] . "'>'".$row['djname'].", Rs. ".$row['djPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>MC : </td>
			<td><select name="opt3" style="width:200px">
				<option selected="selected" name="1000">--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT mcid, mcname, mcPrice FROM mc";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['mcid'] . "'>'".$row['mcname'].", Rs. ".$row['mcPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>Caterer : </td>
			<td><select name="opt4" style="width:200px">
				<option selected="selected" name="1000">--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT caid, caname, caPrice FROM caterer";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['caid'] . "'>'".$row['caname'].", Rs. ".$row['caPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>Decorator : </td>
			<td><select name="opt5" style="width:200px">
				<option selected="selected" name="1000">--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT did, dname, dPrice FROM decorator";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['did'] . "'>'".$row['dname'].", Rs. ".$row['dPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>Hall : </td>
			<td><select name="opt6" style="width:200px">
				<option selected="selected" name="1000">--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT Hid, Hname, HPrice FROM hall";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['Hid'] . "'>'".$row['Hname'].", Rs. ".$row['HPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>Car : </td>
			<td><select name="opt7" style="width:200px">
				<option selected="selected" name="1000">--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT Cid, CType, CPrice FROM car";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['Cid'] . "'>'".$row['CType'].", Rs. ".$row['CPrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			
			
			<tr><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td>Cake : </td>
			<td><select name="opt8" style="width:200px">
				<option selected="selected" name="1000">--None--</option>
				<?php 
					$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);
					$sql = "SELECT cakeid, cakename, cakePrice FROM cake";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							echo "<option value='" . $row['cakeid'] . "'>'".$row['cakename'].", Rs. ".$row['cakePrice']."'</option>";
						}
					}
					$conn->close();
				?>  	
			</select></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			<tr><td>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td><td><label for="date">BOOKING DATE</label></td>
										
				<td><input type="date" name="date" placeholder="DD/ MM/ YY" ></td><td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </td></tr>
			
			</table>
			<hr>
			<tr><td colspan="4"><center><br><button type="submit" value="Submit" name="upload">ADD</button></center></td></tr>
		</form>
	</body>
</html>