#!/usr/local/bin/php
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Login/Registration</title> 
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="utils.js">
			// function login_or_redirect() {
			// 	var cookies = document.cookie.split(";");
			// 	var logged_in = false;
			// 	for(let i = 0; i < cookies.length; i++) {
			// 		var cookie = cookies[i].split("=");
			// 		if(cookie[0]=="user") {
			// 			logged_in = true;
			// 		}
			// 	}
			// 	if(!logged_in) {
			// 		window.location.replace("http://pic.ucla.edu/~mdavis17/final_project/login.php");
			// 	}
			// }
			login_or_redirect();
		</script>
	</head>

	<body>

		<?php include 'header.php';?>
		<p>Welcome to your progress page!</p>
	</body>
</html>