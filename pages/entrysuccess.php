<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HOORAY!</title>
</head>
<body>
	<center><h1>YOU DID IT! WOW!</h1></center>
	<?php
		include('../config/sqldb_conf.php');
		$table_config = include('../config/qtable-conf.php');

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
			$desc = $_POST['description'];
			$qtable_0 = "";
			$qtable_1 = "";
			$index = 0;
			foreach ($_POST as $key => $value) {
				if ($index < count($table_config['table_0']) - 1) {
					$qtable_0 .= $value;
				}
				elseif ($index < count($table_config['table_0']) + count($table_config['table_1']) - 2) {
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
				echo "New record created successfully\n";
			}
			else {
				echo "Error: " . $query . "<br>" . $conn->error;
			}
		}
		else {
			echo "Error creating table: " . $conn->error;
		}
		$conn->close();
	?>
</body>
</html>
