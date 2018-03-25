#!/usr/local/bin/php -d display_errors=STDOUT
<?php
	$status = "";
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

	$sql= "CREATE TABLE IF NOT EXISTS $table (
		$field1 varchar(15),
		$field2 int,
		$field3 varchar(100),
		$field4 varchar(1000)
	)";
	$result = $db->query($sql);

	$user = $_COOKIE['user'];
	$time = strtotime($_POST['time']);
	$moves = $_POST['moves'];
	$notes = $_POST['notes'];
	
	
	// $update_string = "user='$user',time='$time',moves='$moves',notes='$notes'";
	

	$sql = "INSERT INTO $table (user,time,moves,notes) VALUES ('$user','$time','$moves','$notes')";
	$result = $db->query($sql);


	

	$stance = $_POST['stance'];
	$step_slide = $_POST['step_slide'];
	$shadowbox = $_POST['shadowbox'];
	$jab = $_POST['jab'];
	$cross = $_POST['cross'];
	$hook = $_POST['hook'];
	$h_elbow = $_POST['h_elbow'];
	$dr_elbow = $_POST['dr_elbow'];
	$teep = $_POST['teep'];
	$round = $_POST['round'];
	$skip_knee = $_POST['skip_knee'];
	$straight_knee = $_POST['straight_knee'];
	$four_count1 = $_POST['four_count_1'];
	$four_count_2 = $_POST['four_count_2'];
	$four_count_3 = $_POST['four_count_3'];
	$four_count_4 = $_POST['four_count_4'];
	$pillar_d = $_POST['pillar_d'];
	$parry_d = $_POST['parry_d'];
	$tight_cover_d = $_POST['tight_cover_d'];

	$notes = $_POST['notes'];





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

	$result = $db->query($sql);
	
	

	$sql = "SELECT * FROM $table WHERE user='$user'";
	$result = $db->query($sql);
	// get current values for training data
	$move_nums = array();
	if($record = $result->fetchArray()) {
		for($j = 1;$j < sizeof($fields);$j++) {
			$move_nums[] = $record[$fields[$j]];
		}
	}
	$status .="count from selecting $user".Count($result);
	

	// check if a move was "on" and update the local variable value (+1)
	
	$update_string = "user='$user',";
	for($i = 1; $i < sizeof($fields); $i++) {
		$post = $_POST[$fields[$i]];
		if($post == "on") {
			$move_nums[$i-1] += 1;
		}
		$update_string .= $fields[$i]."='".$move_nums[$i-1]."',";
	}
	

	$sql = "UPDATE $table SET ".substr($update_string,0,-1)." WHERE user='$user'";
	$result = $db->query($sql);

	$status .="updating $user";

	$db->close();
	unset($db);


?>