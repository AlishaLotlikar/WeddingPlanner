<?php
$conn = new mysqli("localhost","root","","weddingplanner")or die("Connection Failed : ".$conn->connect_error);

	if (isset($_POST['upload']))
	{
		$cardNumber = $_POST['cardNumber'];
	    $cardExpiry = $_POST['cardExpiry'];
		$cardCVC = $_POST['cardCVC'];
		
		
		$query = "INSERT INTO debitcard (debitCardNo, debitEx, debitCVV) VALUES ( '$cardNumber', '$cardExpiry', '$cardCVC')";
		if($conn->query($query))
		{
			echo "<script>
						alert('PAYMENT SUCCESSFULL!');
						window.location.href='bill.php';
					</script>";
		}
		else
		{
			echo "<script>alert('FAILED TO PAY');</script>";
		}
	}
?>
