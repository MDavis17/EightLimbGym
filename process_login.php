#!/usr/local/bin/php
<?php
	$ttl = 3600; // seconds (3600=1hr)
	function create_update_cookie($user_name,$time_to_exp) {
		setcookie("user",$user_name,time()+$time_to_exp);
	}

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

	$f_name = $_POST['first'];
	$l_name = $_POST['last'];
	$u_name = $_POST['user'];
	$email = $_POST['email'];

	$sql = "SELECT * FROM $table WHERE user='$u_name'";
	$result = $db->query($sql);

	if($record = $result->fetchArray()) {
		create_update_cookie($u_name,$ttl);
		header("Location: http://pic.ucla.edu/~mdavis17/final_project/my_progress.php");
	}
	else {
		print "<p>there is nobody with the username: $u_name</p>";
	}
?>