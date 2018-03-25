#!/usr/local/bin/php
<?php
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

	$table = "white";
	$fields = array("user","time","stance","step_slide","shadowbox","jab","cross","hook","h_elbow","dr_elbow","teep","round","skip_knee","straight_knee","four_count_1","four_count_2","four_count_3","four_count_4","pillar_d","parry_d","tight_cover_d","wai_q","ka_kap_q","mai_ka_kap_q","sawadee_ka_kap_q","teep_q","sawk_q","tang_q");


	$user = $_COOKIE['user'];

	$sql = "SELECT * FROM $table WHERE user='$user'";
	$result = $db->query($sql);

	$return_str = "";
	if($record = $result->fetchArray(SQLITE3_ASSOC)) {
		foreach($record as $move) {
			if(is_numeric($move)) {
				echo $move.",";
				$return_str .= $move.",";
			}
		}
	}

	$db->close();
	unset($db);
?>