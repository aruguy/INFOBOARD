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
	
	if (isset ($_POST['remove']))
	{
		$del = $_POST['remove'];
		if ($del != "Select")
		{
			$query = "delete from staff where employee='$del'";
			//echo $query;
			$conn->query($query);
			//header("location: http://ubuntu-box/INFOBOARD/admin/remove.php");
			header("location: http://ubuntu-box/INFOBOARD/admin/admin.php");
		}
		elseif ($del == "Select")
		{
			//header("location: http://ubuntu-box/INFOBOARD/admin/remove.php");
			header("location: http://ubuntu-box/INFOBOARD/admin/admin.php");
		}
	}

?>
