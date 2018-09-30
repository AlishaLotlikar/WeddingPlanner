<html>
	<body>
	<?php
		$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);

		if(isset($_GET['id']) & !empty($_GET['id']))
		{
			$id = $_GET['id'];
		
		$sql3="select type from cart where type='band' or type='car' or type='cake' or type='band' or type='decorator' or type='caterer' or type='mc' or type='dj'";
		$result = $conn->query($sql3);
		if ($result->num_rows > 0) 
		{
			echo "You cannot have more than one package in the cart";
		}
		else
		{
		$sql1="select PckgType from package where Pckgid='$id'";
		$result = $conn->query($sql1);
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				$pack=$row['PckgType']."package";
			}
		}
			
		$sql="select b.bandid, b.bandname, b.bandPrice from band b, package p, ".$pack." pa where pa.bandid=b.bandid and pa.pckgid=p.pckgid and p.pckgid='$id'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$sql="INSERT INTO cart (id, name, type, price)VALUES('$row[bandid]', '$row[bandname]', 'band', '$row[bandPrice]')";
				$conn->query($sql);
			}
		}
		else
		{
			echo "Package Could not be added to the cart";
		}
		
		$sql="select c.cakeid, c.cakename, c.cakePrice from cake c, package p, ".$pack." pa where pa.cakid=c.cakeid and pa.pckgid=p.pckgid and p.pckgid='$id'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$sql="INSERT INTO cart (id, name, type, price)VALUES('$row[cakeid]', '$row[cakename]', 'cake', '$row[cakePrice]')";
				$conn->query($sql);
			}
		}
		else
		{
			echo "Package Could not be added to the cart";
		}
		
		$sql="select c.Cid, c.CType, c.CPrice from car c, package p, ".$pack." pa where pa.Cid=c.Cid and pa.pckgid=p.pckgid and p.pckgid='$id'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$sql="INSERT INTO cart (id, name, type, price)VALUES('$row[Cid]', '$row[CType]', 'car', '$row[CPrice]')";
				$conn->query($sql);
			}
		}
		else
		{
			echo "Package Could not be added to the cart";
		}
		
		$sql="select c.Caid, c.Caname, c.CaPrice from caterer c, package p, ".$pack." pa where pa.Caid=c.Caid and pa.pckgid=p.pckgid and p.pckgid='$id'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$sql="INSERT INTO cart (id, name, type, price)VALUES('$row[Caid]', '$row[Caname]', 'caterer', '$row[CaPrice]')";
				$conn->query($sql);
			}
		}
		else
		{
			echo "Package Could not be added to the cart";
		}
		
		$sql="select d.did, d.dname, d.DPrice from decorator d, package p, ".$pack." pa where pa.did=d.did and pa.pckgid=p.pckgid and p.pckgid='$id'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$sql="INSERT INTO cart (id, name, type, price)VALUES('$row[did]', '$row[dname]', 'decorator', '$row[DPrice]')";
				$conn->query($sql);
			}
		}
		else
		{
			echo "Package Could not be added to the cart";
		}
		
		$sql="select dj.djid, dj.djname, dj.djPrice from dj, package p, ".$pack." pa where pa.djid=dj.djid and pa.pckgid=p.pckgid and p.pckgid='$id'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$sql="INSERT INTO cart (id, name, type, price)VALUES('$row[djid]', '$row[djname]', 'dj', '$row[djPrice]')";
				$conn->query($sql);
			}
		}
		else
		{
			echo "Package Could not be added to the cart";
		}
		
		$sql="select h.hid, h.hname, h.HPrice from hall h, package p, ".$pack." pa where pa.hid=h.hid and pa.pckgid=p.pckgid and p.pckgid='$id'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$sql="INSERT INTO cart (id, name, type, price)VALUES('$row[hid]', '$row[hname]', 'hall', '$row[HPrice]')";
				$conn->query($sql);
			}
		}
		else
		{
			echo "Package Could not be added to the cart";
		}
		
		$sql="select mc.mcid, mc.mcname, mcPrice from mc, package p, ".$pack." pa where pa.mcid=mc.mcid and pa.pckgid=p.pckgid and p.pckgid='$id'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) 
		{
			while($row = $res->fetch_assoc()) 
			{
				$sql="INSERT INTO cart (id, name, type, price)VALUES('$row[mcid]', '$row[mcname]', 'mc', '$row[mcPrice]')";
				$conn->query($sql);
			}
		}
		else
		{
			echo "Package Could not be added to the cart";
		}
		echo "Successfully added to the cart";
		}
		}
		else
		{
			echo "Could not add to cart1";
		}
	?>
	</body>
</html>