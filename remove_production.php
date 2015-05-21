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
	echo YAY;

	$query = "select count(rowid) from production";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_row($result);
		$num = $row[0];	
		echo $num;
		
		$remove = $_POST['remove'];
		echo $remove;
		$del = $num-$remove;
		echo $del;
		$query = "delete from production where rowid=$del";
		echo $query;
		
	echo END;
		//$result = $conn->query($query);
	
?>
