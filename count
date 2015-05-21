<?php
	//login
	require_once "../login.php";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
//take out echo
echo "Connected Successfully</br>";

	$query = "select number from machines where type='bolt'";
		$result = $conn->query($query);
		if (!$result) die($con->error);
		$rows = $result->num_rows;
		echo "$rows machines";
				
		for ($r = 0 ; $r < $rows ; ++$r)
		{
			$result->data_seek($r);
			$row = $result->fetch_assoc();
			$num = $row['number'];
			echo "</br>".$num;
			
			//$query = "</br>select pieces from production where machine='".$num."'";
			//echo $query "</br>";
		}
		
		echo "</br>
		select sum(pieces) from production where (machine=30 or machine=29 or machine=31 or machine=36 or machine=37 or machine=38 or machine=39) and date='2015-05-20'";
		//echo $query;
		echo "</br>end";
?>					
