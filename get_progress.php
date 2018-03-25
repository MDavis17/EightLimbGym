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

	// $field1 = "user";
	// $field2 = "time";
	// $field3 = "stance";
	// $field4 = "step_slide";
	// $field5 = "shadowbox";
	// $field6 = "jab";
	// $field7 = "cross";
	// $field8 = "hook";
	// $field9 = "h_elbow";
	// $field10 = "dr_elbow";
	// $field11 = "teep";
	// $field12 = "round";
	// $field13 = "skip_knee";
	// $field14 = "straight_knee";
	// $field15 = "four_count_1";
	// $field16 = "four_count_2";
	// $field17 = "four_count_3";
	// $field18 = "four_count_4";
	// $field19 = "pillar_d";
	// $field20 = "parry_d";
	// $field21 = "tight_cover_d";
	// $field22 = "Wai_q";
	// $field23 = "Ka_Kap_q";
	// $field24 = "Mai_Ka_Kap_q";
	// $field25 = "Sawadee_Ka_Kap_q";
	// $field26 = "Teep_q";
	// $field27 = "Sawk_q";
	// $field28 = "Tang_q";



	// $sql= "CREATE TABLE IF NOT EXISTS $table (
	// 	".$fields[0]." int,
	// 	".$fields[1]." int,
	// 	".$fields[2]." int,
	// 	".$fields[3]." int,
	// 	".$fields[4]." int,
	// 	".$fields[5]." int,
	// 	".$fields[6]." int,
	// 	".$fields[7]." int,
	// 	".$fields[8]." int,
	// 	".$fields[9]."int,
	// 	".$fields[10]." int,
	// 	".$fields[11]." int,
	// 	".$fields[12]." int,
	// 	".$fields[13]."int,
	// 	".$fields[14]." int,
	// 	".$fields[15]." int,
	// 	".$fields[16]." int,
	// 	".$fields[17]." int,
	// 	".$fields[18]." int,
	// 	".$fields[19]." int,
	// 	".$fields[20]." int,
	// 	".$fields[21]." int,
	// 	".$fields[22]." int,
	// 	".$fields[23]." int,
	// 	".$fields[24]." int,
	// 	".$fields[25]." int,
	// 	".$fields[26]." int,
	// 	".$fields[27]." int
	// )";
	// $result = $db->query($sql);

	$user = $_COOKIE['user'];
	// $time = $_GET['time'];
	// $stance = $_GET['stance'];
	// $step_slide = $_GET['step_slide'];
	// $shadowbox = $_GET['shadowbox'];
	// $jab = $_GET['jab'];
	// $cross = $_GET['cross'];
	// $hook = $_GET['hook'];
	// $h_elbow = $_GET['h_elbow'];
	// $dr_elbow = $_GET['dr_elbow'];
	// $teep = $_GET['teep'];
	// $round = $_GET['round'];
	// $skip_knee = $_GET['skip_knee'];
	// $straight_knee = $_GET['straight_knee'];
	// $four_count1 = $_GET['four_count_1'];
	// $four_count_2 = $_GET['four_count_2'];
	// $four_count_3 = $_GET['four_count_3'];
	// $four_count_4 = $_GET['four_count_4'];
	// $pillar_d = $_GET['pillar_d'];
	// $parry_d = $_GET['parry_d'];
	// $tight_cover_d = $_GET['tight_cover_d'];
	// $wai_q = $_GET['wai_q'];
	// $ka_kap_q = $_GET['ka_kap_q'];
	// $mai_ka_kap_q = $_GET['mai_ka_kap_q'];
	// $sawadee_ka_kap_q = $_GET['sawadee_ka_kap_q'];
	// $teep_q = $_GET['teep_q'];
	// $sawk_q = $_GET['sawk_q'];
	// $tang_q = $_GET['tang_q'];

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

	// if($result = $db->query($sql)) {
	// 	
	
?>