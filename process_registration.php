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


	$f_name = $_POST['first'];
	$l_name = $_POST['last'];
	$u_name = $_POST['user'];
	$email = $_POST['email'];

	$table = "white";
	$fields = array("user","stance","step_slide","shadowbox","jab","cross","hook","h_elbow","dr_elbow","teep","round","skip_knee","straight_knee","four_count_1","four_count_2","four_count_3","four_count_4","pillar_d","parry_d","tight_cover_d");//,"wai_q","ka_kap_q","mai_ka_kap_q","sawadee_ka_kap_q","teep_q","sawk_q","tang_q");

	$sql= "CREATE TABLE IF NOT EXISTS $table (
		".$fields[0]." varchar(15),
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

	$sql = "INSERT INTO $table (user) VALUES ('$u_name')";
	$result = $db->query($sql);


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

	
	$table = "users";
	$field1 = "first";
	$field2 = "last";
	$field3 = "user";
	$field4 = "email";

	$sql= "CREATE TABLE IF NOT EXISTS $table (
		$field1 varchar(12),
		$field2 varchar(12),
		$field3 varchar(15),
		$field4 varchar(50)
	)";
	$result = $db->query($sql);


	

	$sql = "SELECT * FROM $table WHERE user='$u_name'";
	$result = $db->query($sql);

	if($record = $result->fetchArray()) {
		print "<p>This username is already taken. Try a different username. If you are already registered, then use login page.</p>";
	}
	else {
		$sql = "INSERT INTO $table (first,last,user,email) VALUES ('$f_name','$l_name','$u_name','$email')";
		if($result = $db->query($sql)) {
			header("Location: http://pic.ucla.edu/~mdavis17/final_project/login.php");
		}
	}
	$db->close();
	unset($db);
?>