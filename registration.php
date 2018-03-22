#!/usr/local/bin/php
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Login/Registration</title> 
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>

	<body>
		<?php include 'header.php';?>
		<p>Welcome to the registration page!</p>
		<form action="http://pic.ucla.edu/~mdavis17/final_project/process_registration.php" method="post">
			<fieldset>
				First Name:<input type="text" id="f_name_reg" name="first"/><br/>
				Last Name:<input type="text" id="l_name_reg" name="last"/><br/>
				Username:<input type="text" id="u_name_reg" name="user"/><br/>
				Email:<input type="text" id="email_reg" name="email"/><br/>
				<input type="submit"/>
			</fieldset>
		</form>
	</body>
</html>