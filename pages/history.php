<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Emotion Tracker - History</title>

	<link rel="stylesheet" type="text/css" href="../lib/bootstrap-4.6.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<?php
		include("../config/cnf.php");
		include("../site/navbar.php");

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$query = "SELECT * FROM entry";
		$result = $conn->query($query);
	?>
	<div class="container">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>id</th>
					<th>entered_at</th>
					<th>table_0</th>
					<th>table_1</th>
					<th>description</th>
					<th>actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo '<tr id="rowid-'.$row["id"].'">';
							echo "<td>".$row["id"]."</td>";
							echo "<td>".$row["entered_at"]."</td>";
							echo "<td>".$row["table_0"]."</td>";
							echo "<td>".$row["table_1"]."</td>";
							echo "<td>".$row["description"]."</td>";
							echo "<td>";
							include("../site/history_action_btns.php");
							echo "</td>";
							echo "</tr>";
						}
					} else {
						echo "0 results";
					}
					$conn->close();
				?>
			</tbody>
		</table>
	</div>

</body>
	<script type="text/javascript" src="../lib/jquery-3.6.0/jquery-3.6.0.slim.min.js"></script>
	<script type="text/javascript" src="../lib/propper-2.9.2/propper.min.js"></script>
	<script type="text/javascript" src="../lib/bootstrap-4.6.0/js/bootstrap.min.js"></script>
</html>
