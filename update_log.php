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
	$db->close();
	unset($db);
?>