<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Eaglehead Manufacturing Co. Informational Board Productivity Page</title>
		<link rel="stylesheet" href="../style.css">
	</head>
	<body>
		<div id="index">
			<p><h1><a href="http://ubuntu-box/INFOBOARD/">Eaglehead Manufacturing Co. Informational Board</a></h1><p>
			<p><h2>Productivity Index</h2></p>
			<p><h3>
					<?php
					//login
					require_once "../login.php";
					//Create & Test Connection
					require_once "../conn.php";
					?>
			</br>Version 0.50 WIP</h3><p>
		</div>
		<div id="form">
		<form action="add_production.php" method="post">
			<fieldset><legend>Employee Production</legend>
		<span>	
			<span>
				<label>Operator:</br>
					<select name="operator" autofocus>
					<option>Select</option>
					<?php
						$query = "select employee from staff where(shift='1' or shift='2' or shift='3') order by employee";
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
			</span>
			<span>	
				<label>Machine:</br>
					<select name="machine">
					<option>Select</option>
					<?php
						$query = "select number from machines";
						$result = $conn->query($query);
						if (!$result) die($con->error);
						$rows = $result->num_rows;
						for ($r = 0 ; $r < $rows ; ++$r)
							{
								$result->data_seek($r);
								$row = $result->fetch_assoc();
								echo '<option value="' . $row['number'] . '">' . $row['number'] . '</option>';
							}	
						$result->close();
						$conn->close;
					?>
					<option>Eagle</option>
					</select>	
				</label>
			</span>
			<span>
				<label>Job #:</br>
					<input type="number" name="job" size="6">			
				</label>
			</span>
		</span>
		<span>
			<span>
				<label>Pieces:</br>
					<input type="number" name="produced" min="1" max="55555">
				</label>
			</span>
			<span>
				<label>Hours:</br>
					<input type="number" name="hours" min="0" max="24" step=".25">
				</label>
			</span>
			<span>
				<label>Date:</br>
					<input type="date" name="date">
				</label>
			</span>
			<span>
				</br><input type="submit">
			</span>
		</span>
			</fieldset>	
		</form>
		</div>
		<div id="clear">
		</div>
		<div id="entry_hist">
			<table>
			<?php
				$query = "select * from production order by rowid desc limit 15";
						$result = $conn->query($query);
						if (!$result) die($con->error);
						$rows = $result->num_rows;
						//start table nonsense
						echo "<tr> <th>Operator</th> <th>Machine</th> <th>Job Number</th> <th>Pieces</th> <th>Hours</th> <th>Rate</th> <th>Date</th> <th></th>";				
						
						for ($r = 0 ; $r < $rows ; ++$r)
							{
								$result->data_seek($r);
								$row = $result->fetch_assoc();
								echo "<tr>";
								echo "<td>".$row['operator']."</td><td>".$row['machine']."</td><td>".$row['job']."</td><td>".$row['pieces']."</td><td>".$row['hours']."</td><td>".$row['rate']."</td><td>".$row['date']."</td><td>".'<form action="remove_production.php" method="post"><input type="hidden" name="remove" value="'.$r.'"><input type="submit" value="remove"></form>'."</td>";
								echo "</tr>";	
							}
			?>
			</table>
		</div>
		
		<form action="remove_production.php" method="post"><input type="hidden" name="remove" value="$r"><input type="submit" value="remove"></form>
		
		<!-- This site map div is more or less temporary but useful right now.-->
			<div id="clear">
			</div>
		<div id="site-map">
			<p>Site-Map</p>
			<ul>
				<li><a href="../">Index</a></li>
				<li><a href="../assignments/">Assignments</a></li>
				<li><a href="../admin">Administration</a></li>
			</ul>
		</div>
	</body>
</html>
