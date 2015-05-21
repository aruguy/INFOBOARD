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
	
	if (isset ($_POST['edit']))
	{
		$mod = $_POST['edit'];
		$pos = $_POST['position'];
		$nrm = $_POST['normal'];
		if($pos == "Office" || $pos == "Mechanic")
		{
			$sft = "0";
			$start = "00:00";
			$end = "00:00";
		}
		else
		{
			$sft = $_POST['shift'];
			if($nrm == "1")
			{
				if($sft == "1")
				{
					$start = "07:00";
					$end = "15:30";
				}
				if($sft == "2")
				{
					$start = "15:30:00";
					$end = "24:00";
				}
				if($sft == "3")
				{
					$start = "23:45";
					$end = "07:00";
				}
			}
			else
			{
				$start = $_POST['stime'];
				$end = $_POST['etime'];
			}
			
		}
		//echo $mod."</br>".$pos."</br>".$sft."</br>".$start."</br>".$end."</br>";
		
		if ($mod != "Select")
		{
			$query = "update staff set position='$pos' where employee='$mod'";
			//echo $query."<br>";
			$conn->query($query);
			$query = "update staff set shift='$sft' where employee='$mod'";
			//echo $query."</br>";
			$conn->query($query);
			$query = "update staff set start='$start' where employee='$mod'";
			//echo $query."</br>";
			$conn->query($query);
			$query = "update staff set end='$end' where employee='$mod'";
			//echo $query."</br>";
			$conn->query($query);
			header("location: http://ubuntu-box/INFOBOARD/admin/admin.php");
		}
	}

?>
