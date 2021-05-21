<!DOCTYPE html>
<html>
<head>
	<title>Emotion Tracker</title>
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/questionnaire.css">
	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
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
			<div id="questionnaire" class="q-grid-container">
				<?php
					$grid_content = [
						["", "0 (not at all)", "1 (a little)", "2 (moderately)", "3 (quite a bit)", "4 (extremely)"],
						["Anger-Hostility" , "", "", "", "", ""],
						["Confusion-Bewilderment" , "", "", "", "", ""],
						["Depression-Dejection" , "", "", "", "", ""],
						["Fatigue-Inertia" , "", "", "", "", ""],
						["Tension-Anxiety" , "", "", "", "", ""],
						["Vigor-Activity" , "", "", "", "", ""],
						["Friendliness" , "", "", "", "", ""]
					];
					for ($row = 0; $row < 8; $row++) {
						for ($clm = 0; $clm < 6; $clm++) {
							echo '<div id="'.$row.'-'.$clm.'"><p>'.$grid_content[$row][$clm].'</p>';
							if (!($row == 0 || $clm == 0)) {
								echo '<input required="required" type="radio" name="attr'.$row.'"'.' value="'.($clm-1).'">';
							}
							echo '</div>';
						}
					}
				?>
			</div>
			<div id="description-div">
				<label>Any additional description?</label>
				<textarea name="description"></textarea>
			</div>
			<input id="submit-btn" type="submit" name="submit" value="Submit">
		</form>
	</main>
</body>
	<script type="text/javascript" src="js/style.js"></script>
</html>
