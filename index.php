<!DOCTYPE html>
<html>
<head>
	<title>Emotion Tracker</title>
	
	<link rel="stylesheet" type="text/css" href="lib/bootstrap-4.6.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" type="text/css" href="css/questionnaire.css">
	<link rel="stylesheet" type="text/css" href="config/qtable-conf.css">
</head>
<body>
	<?php
		include("config/cnf.php");

		// Inserting navbar
		include("site/navbar.php");
	?>
	<main>
		<form action="pages/entrysuccess.php" method="POST">
			<div id="qtables" class="q-grid-container">
				<?php
					$table_config = include('config/qtable-conf.php');
					$num = 0;
					for ($i = 0; $i < $table_config['table_count']; $i++) {
						echo '<div class="qtable" id="qtable-'.$i.'">';
						for ($row = 0; $row < count($table_config['table_'.$i]); $row++) {
							for ($clm = 0; $clm < count($table_config['table_'.$i][$row]); $clm++) {
								$cell_content = $table_config['table_'.$i][$row][$clm];
								echo '<div class="qtable-item">';
								$id = $i.'-'.$row.'-'.$clm;
								$name = $i.'-'.$row;
								if ($cell_content == "[RADIO]") {
									echo '<input type="radio" class="qtable-radio" name="'.$name.'"  id='.$id.' value="'.$clm.'">';
								} elseif ($cell_content == '[EMPTY]') {
									echo "";
								} elseif ($cell_content == '[RANGE]') {
									echo '<input type="range" min="0" max="4" step="0" class="qtalbe-range" name="'.$name.'"  id='.$id.'>';
								} elseif (gettype($cell_content) == 'string' && strlen($cell_content) > 0) {
									// it has to be a the name of the row
									echo '<p>'.$table_config['table_'.$i][$row][$clm].'</p>';
								} else {
									echo "Undefined item type";
								}
								echo '</div>';
							}
						}
						echo '</div>';
					}
				?>
			</div>
			<div id="description-div">
				<label>Any additional description?</label>
				<textarea maxlength="300" name="description"></textarea>
			</div>
			<input id="submit-btn" type="submit" name="submit" value="Submit">
		</form>
		<?php			
			$time_now = localtime(time(),true)['tm_hour'] .':'. localtime(time(),true)['tm_min'] .':'. localtime(time(),true)['tm_sec'];
			if ($_POST['submit'] == 'Submit') {
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
				print_r($_POST);
				$new_entry = $today.','.$time_now.','.$qtable_0.','.$qtable_1.','.$_POST['description'].';'."\n";}
				print $new_entry;
		?>
	</main>
</body>
</html>
