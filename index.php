<!DOCTYPE html>
<html>
<head>
	<title>Emotion Tracker</title>
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/questionnaire.css">
	<script type="text/javascript" src="lib/jquery-3.6.0.slim.min.js"></script>
</head>
<body>
	<nav>
		<div id="menu-toggle">MENU HERE</div>
		<div id="date-div">
			<?php
				$today = getdate()["mday"] ."/". getdate()["mon"] ."/". getdate()["year"];
			?>
			<form action="#">
				<lable for="date-input">date:</lable>
				<input type="text" id="date-input" name="date" value="<?= $today ?>">
			</form>
		</div>
	</nav>
	<main>
		<form action="#" method="POST">
			<div id="qtables" class="q-grid-container">
				<?php
					$table_config = include('config/qtable-config.php');
					$num = 0;
					for ($i = 0; $i < $table_config['table_count']; $i++) {
						echo '<div class="qtable">';
						for ($row = 0; $row < count($table_config['table_'.$i]); $row++) {
							for ($clm = 0; $clm < count($table_config['table_'.$i][0]); $clm++) {
								$cell_content = $table_config['table_'.$i][$row][$clm];
								echo '<div class="qtable-item">';
								$id = $i.'-'.$row.'-'.$clm;
								if ($cell_content == "[RADIO]") {
									$name = $i.'-'.$row;
									echo '<input type="radio" class="qtable-radio" name="'.$name.'"  id='.$id.' value="'.$clm.'">';
								} elseif (gettype($cell_content) == 'string' && strlen($cell_content) > 0) {
									// it has to be a the name of the row
									echo '<p>'.$table_config['table_'.$i][$row][$clm].'</p>';
								} elseif ($cell_content == '[EMPTY]') {
									continue;
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
				<textarea name="description"></textarea>
			</div>
			<input id="submit-btn" type="submit" name="submit" value="Submit">
		</form>
		<?php
			if ($_POST['submit'] == 'Submit') {
				print_r($_POST);
			}
		?>
	</main>
</body>
	<script type="text/javascript" src="js/style.js"></script>
</html>
