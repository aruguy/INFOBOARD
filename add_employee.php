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
	
	if (isset ($_POST['add']))
	{
		$add = $_POST['add'];
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
		//echo $add."</br>".$pos."</br>".$sft."</br>".$start."</br>".$end."</br>";
		$query = "insert into staff (employee, position, shift, start, end, password) values('$add', '$pos', '$sft', '$start', '$end', NULL)";
		//echo $query;
		$result = $conn->query($query);
		
		header("location: http://ubuntu-box/INFOBOARD/admin/admin.php");	
	}

?>
