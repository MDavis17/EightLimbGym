<?php 
	// $firstname = "firstname";
	// $user = $_GET['user'];
	$user = $_COOKIE["user"];
	echo "<div class='header'>";
		if($user) {

			try  
			{     
				$db = new SQLite3("muaythai.db");
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

			$sql = "SELECT * FROM $table WHERE user='$user'";
			$result = $db->query($sql);

			if($record = $result->fetchArray()) {
				echo "<p id='user'>Sawadee krup ".$record[$field1]."!</p>";
			}
			else {
				echo "<p id='user'>No record.Sawadee krup!</p>";
			}
		}
		else {
			echo "<p id='user'>Sawadee krup!</p>";

		}
		echo "<input type='button' id='logout' value='Log out' onclick='log_out()'/>";
		echo "<h1><a id= 'title' href='http://pic.ucla.edu/~mdavis17/final_project/home.php'>Eight Limb Gym</a></h1>";
		echo "<h4>Online Muay Thai Training Tool</h3>";
		echo "<ul id='menu'>";
			echo "<li class='menu_item'><a href='http://pic.ucla.edu/~mdavis17/final_project/home.php'>Home</a></li>";
			echo "<li class='menu_item'><a href='http://pic.ucla.edu/~mdavis17/final_project/my_progress.php'>My Progress</a></li>";
		echo "</ul>";
	echo "</div>"; 
?>