<?php 
	// $firstname = "firstname";
	// $user = $_GET['user'];
	$url = "".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
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
				echo "<p id='user'>Sawadee Krup ".$record[$field1]."!";
			}
			else {
				echo "<p id='user'>No record.Sawadee Krup!";
			}
			$db->close();
			unset($db);
		}
		else {
			echo "<p id='user'>Sawadee Krup!";

		}
		echo "<input type='button' id='logout' value='Log out' onclick='log_out(\"http://".$url."\")'/></p>";
		echo "<h1><a id= 'title' href='http://pic.ucla.edu/~mdavis17/final_project/home.php'>Eight Limb Gym</a></h1>";
		echo "<h4>Online Muay Thai Training Tool</h4>";
		echo "<ul id='menu'>";
			echo "<li class='menu_item'><a href='http://pic.ucla.edu/~mdavis17/final_project/home.php'>Home</a></li>";//onclick='setUrl(\"http://pic.ucla.edu/~mdavis17/final_project/home.php\")'//<a href='http://pic.ucla.edu/~mdavis17/final_project/home.php'>Home</a>
			echo "<li class='menu_item'><a href='http://pic.ucla.edu/~mdavis17/final_project/my_progress.php'>My Progress</a></li>";//onclick='setUrl(\"http://pic.ucla.edu/~mdavis17/final_project/my_progress.php\")'//<a href='http://pic.ucla.edu/~mdavis17/final_project/my_progress.php'>My Progress</a>
		echo "</ul>";
	echo "</div>";

	if($_GET['login'] == 'failed') {
		print "<p id='error'>There is no user registed with that username. Try again, or register as a new user.</p>";
	}
	elseif($_GET['my_progress'] == 'false') {
		print "<p id='error'>Please log in to view your progress.</p>";
	}




?>