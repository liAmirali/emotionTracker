<?php
	# Also go check config/qtable-config.css and fill some forms there
	return array(
		'table_count' => 2,
		'table_0' => [
			["[EMPTY]", "0 (not at all)", "1 (a little)", "2 (moderately)", "3 (quite a bit)", "4 (extremely)"],
			["Anger-Hostility", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]"],
			["Confusion-Bewilderment", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]"],
			["Depression-Dejection", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]"],
			["Fatigue-Inertia", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]"],
			["Tension-Anxiety", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]"],
			["Vigor-Activity", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]"],
			["Friendliness", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]", "[RADIO]"]
		],
		'table_1' => [
			["[EMPTY]", "(LEFT) 0", "1", "2", "3", "4 (RIGHT)"],
			["Elated-Depressed", "[RANGE]"],
			["Composed-Anxious", "[RANGE]"],
			["Confident-Unsure", "[RANGE]"],
			["Agreeable-Hostile", "[RANGE]"],
			["Clearheaded-Confused", "[RANGE]"],
			["Energetic-Tired", "[RANGE]"]
		]
	);
?>
