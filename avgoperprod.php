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
		<div id="avestats">
			<table>
				<tr><th></th>
				<?php
					$whichmachines = "select number from machines order by status, type, subtype, list";
						$machines = $conn->query($whichmachines);
						if (!$machines) die($conn->error);
						$cols = $machines->num_rows;
						for ($c = 0 ; $c < $cols ; ++$c)
						{
							$machines->data_seek($c);
							$col = $machines->fetch_assoc();
							$mchn = $col['number'];
							echo "<th>".$mchn."</th>";
						}
				?>		
				</tr>
				<tr>
				<?php
					$whichoperators = "select employee from staff where shift>0 order by shift asc, position desc, employee asc";
						$operators = $conn->query($whichoperators);
						if (!$operators) die($conn->error);
						$rows = $operators->num_rows;
						for ($r = 0; $r < $rows; ++$r)
						{
							$operators->data_seek($r);
							$row = $operators->fetch_assoc();
							$emp = $row['employee'];
							echo "<td>".$emp."</td>";
							echo "</tr>";
						}	
				?>			
							
			</table>
		</div>





	</body>
</html>
