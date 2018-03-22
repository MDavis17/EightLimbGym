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
		print "<p>This username is already taken. Try a different username. If you are already registered, then use login page.</p>";
	}
	else {
		$sql = "INSERT INTO $table (first,last,user,email) VALUES ('$f_name','$l_name','$u_name','$email')";
		if($result = $db->query($sql)) {
			header("Location: http://pic.ucla.edu/~mdavis17/final_project/login.php");
		}
	}
?>