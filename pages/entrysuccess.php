<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Emotion Tracker - Record Entry</title>

	<link rel="stylesheet" type="text/css" href="../lib/bootstrap-4.6.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<?php
		include('../config/cnf.php');
		include("../site/navbar.php");

		$table_config = include('../config/qtable-conf.php');

		if ($_POST['submit'] == "Submit") {
		
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$query = "CREATE TABLE IF NOT EXISTS entry (
				id INT PRIMARY KEY AUTO_INCREMENT,
				entered_at DATETIME DEFAULT CURRENT_TIMESTAMP,
				table_0 VARCHAR(15) NOT NULL,
				table_1 VARCHAR(15) NOT NULL,
				description VARCHAR(300)
			)";

			if ($conn->query($query) === TRUE) {
				$desc = addslashes($_POST['description']);
				$qtable_0 = "";
				$qtable_1 = "";
				$index = 0;
				foreach ($_POST as $key => $value) {
					if ($index < count($table_config['table_0']) - 1) {
						$qtable_0 .= $value;
					} elseif ($index < count($table_config['table_0']) + count($table_config['table_1']) - 2) {
						$qtable_1 .= $value;
					}
					$index++;
				}

				$query = "INSERT INTO entry (
					table_0,
					table_1,
					description
				)
				VALUES (
					'$qtable_0',
					'$qtable_1',
					'$desc'
				)";

				if ($conn->query($query) === TRUE) {
					include("../site/entry_success_alert.php");
				} else {
					echo "Error: " . $query . "<br>" . $conn->error;
				}
			} else {
				echo "Error creating table: " . $conn->error;
			}
			$conn->close();

		}

		?>

</body>
	<script type="text/javascript" src="../lib/jquery-3.6.0/jquery-3.6.0.slim.min.js"></script>
	<script type="text/javascript" src="../lib/propper-2.9.2/propper.min.js"></script>
	<script type="text/javascript" src="../lib/bootstrap-4.6.0/js/bootstrap.min.js"></script>
</html>
