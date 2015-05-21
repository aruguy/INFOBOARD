<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Eaglehead Manufacturing Co. Informational Board Administration Page</title>
		<link rel="stylesheet" href="../style.css">
	</head>
	<body>
		<div id="index">
			<p><h1><a href="http://ubuntu-box/INFOBOARD/">Eaglehead Manufacturing Co. Informational Board</a></h1><p>
			<p><h2>Administration Page</h2></p>
			<p><h3>
					<?php
					//login
					require_once "../login.php";
					// Create connection
					$conn = new mysqli($servername, $username, $password, $database);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					echo "Connected Successfully";
					?>
			</br>Version 0.75 WIP</h3><p>
		</div>
		<div id="clear">
		</div>
		<div id="admin">
			<span id="add">
				<form action="add_employee.php" method="post">
				<fieldset><legend>Register New Employee</legend>
					<label>New Employee
						<input type="text" name="add" placeholder="FirstName LastName" required>
					</label>
					<label>
						<select name="position">
							<option value="Operator">Operator</option>
							<option value="Supervisor">Supervisor</option>
							<option value="Mechanic">Mechanic</option>
							<option value="Office">Office</option>
						</select>
					</label></br>
					<label>
						<input type="radio" name="shift" value="1" checked>First Shift &nbsp;
					</label>
					<label>
						<input type="radio" name="shift" value="2">Second Shift &nbsp;
					</label>
					<label>
						<input type="radio" name="shift" value="3">Third Shift
					</label></br>
					<label>
						<input type="checkbox" name="normal" value="1"> Normal Schedule Times
					</label></br>
					<label>Start Time:
						<input type="time" name="stime" value="7:00">
					</label>
					<label>End Time:
						<input type="time" name="etime" value="3:30">
					</label></br>
					<input type="submit" value="Register" onclick="clicked(event)">
				</fieldset>
				</form>
			</span>
			<span id="edit">
				<form action="edit_employee.php" method="post">
				<fieldset><legend>Edit Employee Information</legend>
					<label>Select Employee
						<select name="edit">
						<option>Select</option>
						<?php
							$query = "select employee from staff order by employee";
							$result = $conn->query($query);
							if (!$result) die($con->error);
							$rows = $result->num_rows;
							for ($r = 0 ; $r < $rows ; ++$r)
								{
									$result->data_seek($r);
									$row = $result->fetch_assoc();
									//skipped
									echo '<option value="' . $row['employee'] . '">' . $row['employee'] . '</option>';
								}	
							$result->close();
							$conn->close;
						?>	
						</select>
					</label>
					<label>
						<select name="position">
							<option value="Operator">Operator</option>
							<option value="Supervisor">Supervisor</option>
							<option value="Mechanic">Mechanic</option>
							<option value="Office">Office</option>
						</select>
					</label></br>
					<label>
						<input type="radio" name="shift" value="1" checked>First Shift &nbsp;
					</label>
					<label>
						<input type="radio" name="shift" value="2">Second Shift &nbsp;
					</label>
					<label>
						<input type="radio" name="shift" value="3">Third Shift
					</label></br>
					<label>
						<input type="checkbox" name="normal" value="1"> Normal Schedule Times
					</label></br>
					<label>Start Time:
						<input type="time" name="stime" value="7:00">
					</label>
					<label>End Time:
						<input type="time" name="etime" value="3:30">
					</label></br>
					<input type="submit" value="Modify" onclick="clicked(event)">
				</fieldset>
				</form>
			</span>
			<span id="remove">
				<form action="remove_employee.php" method="post">
				<fieldset><legend>Remove Employee</legend>
					<label>Select Employee
						<select name="remove">
						<option value="Select">Select</option>
						<?php
							$query = "select employee from staff order by employee";
							$result = $conn->query($query);
							if (!$result) die($con->error);
							$rows = $result->num_rows;
							for ($r = 0 ; $r < $rows ; ++$r)
								{
									$result->data_seek($r);
									$row = $result->fetch_assoc();
									//skipped
									echo '<option value="' . $row['employee'] . '">' . $row['employee'] . '</option>';
								}	
							$result->close();
							$conn->close;
						?>	
						</select>
					</label></br>
					<input type="submit" value="Remove" onclick="clicked(event)">
				</fieldset>
				</form>
				<script>
						function clicked(e)
						{
							if(!confirm('Please confirm that you want to take this action.'))e.preventDefault();
						}
						</script>
			</span>
		</div>
		<div id="cllear">
		</div>
		<div id="employees">
			<div id="Shift1">
				<p>First Shift Employees</p>
				<u><?php
					$query = "select employee from staff where shift='1' and position='Supervisor'";
					$result = $conn->query($query);
					if (!$result) die($con->error);
					
					$rows = $result->num_rows;
					
					if ($rows == 0)
					{
						echo "**** ****</br>";
					}
					else
					{
						for ($r = 0 ; $r < $rows ; ++$r)
						{
							$result->data_seek($r);
							$row = $result->fetch_assoc();
							//skipped
							echo $row['employee'] . '</br>';
						}
					}	
					
					$result->close();
					$conn->close;
				?></u>
				<?php
					$query = "select employee from staff where shift='1' and position='Operator' order by employee";
					$result = $conn->query($query);
					if (!$result) die($con->error);
					
					$rows = $result->num_rows;
					
					if ($rows == 0)
					{
						echo "**** ****</br>";
					}
					else
					{
						for ($r = 0 ; $r < $rows ; ++$r)
						{
							$result->data_seek($r);
							$row = $result->fetch_assoc();
							//skipped
							echo $row['employee'] . '</br>';
						}
					}	
					
					$result->close();
					$conn->close;
				?>
			</div>
			<div id="Shift2">
				<p>Second Shift Employees</p>
				<u><?php
					$query = "select employee from staff where shift='2' and position='Supervisor'";
					$result = $conn->query($query);
					if (!$result) die($con->error);
					
					$rows = $result->num_rows;
					
					if ($rows == 0)
					{
						echo "**** ****</br>";
					}
					else
					{
						for ($r = 0 ; $r < $rows ; ++$r)
						{
							$result->data_seek($r);
							$row = $result->fetch_assoc();
							//skipped
							echo $row['employee'] . '</br>';
						}
					}	
					
					$result->close();
					$conn->close;
				?></u>
				<?php
					$query = "select employee from staff where shift='2' and position='Operator' order by employee";
					$result = $conn->query($query);
					if (!$result) die($con->error);
					
					$rows = $result->num_rows;
					
					if ($rows == 0)
					{
						echo "**** ****</br>";
					}
					else
					{
						for ($r = 0 ; $r < $rows ; ++$r)
						{
							$result->data_seek($r);
							$row = $result->fetch_assoc();
							//skipped
							echo $row['employee'] . '</br>';
						}
					}	
					
					$result->close();
					$conn->close;
				?>
			</div>
			<div id="Shift3">
				<p>Third Shift Employees</p>
				<u><?php
					$query = "select employee from staff where shift='3' and position='Supervisor'";
					$result = $conn->query($query);
					if (!$result) die($con->error);
					
					$rows = $result->num_rows;
					
					if ($rows == 0)
					{
						echo "**** ****</br>";
					}
					else
					{
						for ($r = 0 ; $r < $rows ; ++$r)
						{
							$result->data_seek($r);
							$row = $result->fetch_assoc();
							//skipped
							echo $row['employee'] . '</br>';
						}
					}	
					
					$result->close();
					$conn->close;
				?></u>
				<?php	
					$query = "select employee from staff where shift='3' and position='Operator' order by employee";
					$result = $conn->query($query);
					if (!$result) die($con->error);
					
					$rows = $result->num_rows;
					
					if ($rows == 0)
					{
						echo "**** ****</br>";
					}
					else
					{
						for ($r = 0 ; $r < $rows ; ++$r)
						{
							$result->data_seek($r);
							$row = $result->fetch_assoc();
							//skipped
							echo $row['employee'] . '</br>';
						}
					}	
					
					$result->close();
					$conn->close;
				?>
			</div>
			<div id="clear">
			</div>
		</div>
		<!-- This site map div is more or less temporary but useful right now.-->
			<div id="clear">
			</div>
		<div id="site-map">
			<p>Site-Map</p>
			<ul>
				<li><a href="../">Index</a></li>
				<li><a href="../assignments/">Assignments</a></li>
				<li><a href="../productivity">Productivity</a></li>
			</ul>
		</div>
	</body>
</html>
