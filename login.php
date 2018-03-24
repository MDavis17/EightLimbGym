#!/usr/local/bin/php
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Login/Registration</title> 
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>

	<body>
		<script type="text/javascript" src="utils.js"></script>

		<?php include 'header.php';?>
		<p>
			Welcome to the login page!<br/>
			<a href="#" onclick='register()'>register</a> here if you dont have an account yet! <br/>
		</p>
		<form action="http://pic.ucla.edu/~mdavis17/final_project/process_login.php" method="post">
			<fieldset>
				Username: <input id="user_name" type="text" name="user"/><br/>
				<input type="submit" onclick="setUrl('http://pic.ucla.edu/~mdavis17/final_project/home.php')"/>
			</fieldset>
		</form>
	</body>
</html>