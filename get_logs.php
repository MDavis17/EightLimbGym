#!/usr/local/bin/php
<?php
	date_default_timezone_set('America/Los_Angeles'); 

	$database = "muaythai.db";

	try  
	{     
		$db = new SQLite3($database);
	}
	catch (Exception $exception)
	{
		echo '<p>There was an error connecting to the database!</p>';
		if ($db)
		{
			echo $exception->getMessage();
		}
	}


	$table = "logs";
	$field1 = "user";
	$field2 = "time";
	$field3 = "moves";
	$field4 = "notes";

	$moves = array('stance'=>'Stance','step_slide'=>'Step and slide','shadowbox'=>'Shadowbox','jab'=>'Jab','cross'=>'Cross','hook'=>'Hook','h_elbow'=>'Horizontal elbow','dr_elbow'=>'Diagonal rising elbow','teep'=>'Teep','round'=>'Round kick','skip_knee'=>'Skip knee','straight_knee'=>'Straight knee','four_count_1'=>'Four count one','four_count_2'=>'Four count two','four_count_3'=>'Four count three','four_count_4'=>'Four count four','pillar_d'=>'Pillar defense','parry_d'=>'Parry defense','tight_cover_d'=>'Tight cover defense');


	$sql= "CREATE TABLE IF NOT EXISTS $table (
		$field1 varchar(15),
		$field2 int,
		$field3 varchar(100),
		$field4 varchar(1000)
	)";
	$result = $db->query($sql);

	$user = $_COOKIE['user'];
	

	$sql = "SELECT * FROM $table WHERE user='$user' ORDER BY time";
	$result = $db->query($sql);
	while($row = $result->fetchArray(SQLITE3_ASSOC)) {
		echo "<div class='log_entry'>";
			echo "Date: ".date("m/d/Y",$row['time'])."</br>";
			$moves_arr = explode(",",$row['moves']);
			$move_str = "";
			foreach($moves_arr as $move) {
				$move_str .= $moves[$move].", ";
			}
			echo "Moves practiced: ".substr($move_str,0,-2)."</br>";
			echo "Notes:</br>";
			echo "<div class='notes'>".$row['notes']."</div>";
		echo "</div>";
		// echo date("m/d/Y",$row['time'])." ".$row['moves']." notes: ".$row['notes']."";
	}
	$db->close();
	unset($db);
?>