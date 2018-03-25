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

	$table = "white";
	$fields = array("user","stance","step_slide","shadowbox","jab","cross","hook","h_elbow","dr_elbow","teep","round","skip_knee","straight_knee","four_count_1","four_count_2","four_count_3","four_count_4","pillar_d","parry_d","tight_cover_d");//,"wai_q","ka_kap_q","mai_ka_kap_q","sawadee_ka_kap_q","teep_q","sawk_q","tang_q");

	$sql= "CREATE TABLE IF NOT EXISTS $table (
		".$fields[0]." varchar(50),
		".$fields[1]." int DEFAULT 0,
		".$fields[2]." int DEFAULT 0,
		".$fields[3]." int DEFAULT 0,
		".$fields[4]." int DEFAULT 0,
		".$fields[5]." int DEFAULT 0,
		".$fields[6]." int DEFAULT 0,
		".$fields[7]." int DEFAULT 0,
		".$fields[8]." int DEFAULT 0,
		".$fields[9]." int DEFAULT 0,
		".$fields[10]." int DEFAULT 0,
		".$fields[11]." int DEFAULT 0,
		".$fields[12]." int DEFAULT 0,
		".$fields[13]." int DEFAULT 0,
		".$fields[14]." int DEFAULT 0,
		".$fields[15]." int DEFAULT 0,
		".$fields[16]." int DEFAULT 0,
		".$fields[17]." int DEFAULT 0,
		".$fields[18]." int DEFAULT 0,
		".$fields[19]." int DEFAULT 0
		)";
		// ".$fields[21]." int,
		// ".$fields[22]." int,
		// ".$fields[23]." int,
		// ".$fields[24]." int,
		// ".$fields[25]." int,
		// ".$fields[26]." int,
		// ".$fields[27]." int
	// )";
	$result = $db->query($sql);

	// $user = $_GET['user'];
	$user = $_COOKIE['user'];
	// $time = strtotime($_GET['time']); // time from form
	$stance = $_GET['stance'];
	$step_slide = $_GET['step_slide'];
	$shadowbox = $_GET['shadowbox'];
	$jab = $_GET['jab'];
	$cross = $_GET['cross'];
	$hook = $_GET['hook'];
	$h_elbow = $_GET['h_elbow'];
	$dr_elbow = $_GET['dr_elbow'];
	$teep = $_GET['teep'];
	$round = $_GET['round'];
	$skip_knee = $_GET['skip_knee'];
	$straight_knee = $_GET['straight_knee'];
	$four_count1 = $_GET['four_count_1'];
	$four_count_2 = $_GET['four_count_2'];
	$four_count_3 = $_GET['four_count_3'];
	$four_count_4 = $_GET['four_count_4'];
	$pillar_d = $_GET['pillar_d'];
	$parry_d = $_GET['parry_d'];
	$tight_cover_d = $_GET['tight_cover_d'];

	// $wai_q = $_GET['wai_q'];
	// $ka_kap_q = $_GET['ka_kap_q'];
	// $mai_ka_kap_q = $_GET['mai_ka_kap_q'];
	// $sawadee_ka_kap_q = $_GET['sawadee_ka_kap_q'];
	// $teep_q = $_GET['teep_q'];
	// $sawk_q = $_GET['sawk_q'];
	// $tang_q = $_GET['tang_q'];

	$sql = "SELECT * FROM $table WHERE user='$user'";
	$result = $db->query($sql);
	// get current values for training data
	$move_nums = array();
	if($record = $result->fetchArray()) {
		for($j = 1;$j < sizeof($fields);$j++) {
			$move_nums[] = $record[$fields[$j]];
		}
		// $stance = $record['stance'];
		// $step_slide = $record['step_slide'];
		// $shadowbox = $record['shadowbox'];
		// $jab = $record['jab'];
		// $cross = $record['cross'];
		// $hook = $record['hook'];
		// $h_elbow = $record['h_elbow'];
		// $dr_elbow = $record['dr_elbow'];
		// $teep = $record['teep'];
		// $round = $record['round'];
		// $skip_knee = $record['skip_knee'];
		// $straight_knee = $record['straight_knee'];
		// $four_count1 = $record['four_count_1'];
		// $four_count_2 = $record['four_count_2'];
		// $four_count_3 = $record['four_count_3'];
		// $four_count_4 = $record['four_count_4'];
		// $pillar_d = $record['pillar_d'];
		// $parry_d = $record['parry_d'];
		// $tight_cover_d = $record['tight_cover_d'];
	}
	

	// check if a move was "on" and update the local variable value (+1)
	
	$update_string = "user='$user',";
	for($i = 1; $i < sizeof($fields); $i++) {
		// $var_string .= $fields[$i].",";
		$get = $_GET[$fields[$i]];
		if($get == "on") {
			$move_nums[$i-1] += 1;
		}
		$update_string .= $fields[$i]."='".$move_nums[$i-1]."',";
	}
	

	$sql = "UPDATE $table SET ".substr($update_string,0,-1)." WHERE user='$user'";//(user,".substr($var_string,0,-1).") VALUES ('$user',".substr($val_string,0,-1).")";
	// $sql = "INSERT INTO $table ($field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$field9,$field10,$field11,$field12,$field13,$field14,$field15,$field16,$field17,$field18,$field19,$field20,$field21,$field22,$field23,$field24,$field25,$field26,$field27,$field28) VALUES ('$user','$time','$stance','$step_slide','$shadowbox','$jab','$cross','$hook','$h_elbow','$dr_elbow','$teep','$round','$skip_knee','$straight_knee','$four_count_1','$four_count_2','$four_count_3','$four_count_4','$pillar_d','$parry_d','$tight_cover_d','$Wai_q','$Ka_Kap_q','$Mai_Ka_Kap_q','$Sawadee_Ka_Kap_q','$Teep_q','$Sawk_q','$Tang_q')";
	$return_str = "";
	if($result = $db->query($sql)) {
		foreach($move_nums as $move_num) {
		// $val_string .= "'$move_num'".",";
		$return_str .= $move_num.",";
		}
	}
	echo substr($return_str,0,-1);
?>