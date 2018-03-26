#!/usr/local/bin/php
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Progress</title> 
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="login_or_redirect.js">
		</script>
	</head>

	<body>
		<script type="text/javascript" src="utils.js"></script>
		<?php include 'header.php';?>
		<script type="text/javascript" src="progress.js"></script>
		<div class="main_container">
			<p>Welcome to your progress page!</p>
			<div id="progress_bar"><div id="progress_fill">&nbsp;</div></div>
				
			<div id="progress_div">
				<h2>Requirements for white Prajiet Test</h2>
			</div>
			<form id="form" action="http://pic.ucla.edu/~mdavis17/final_project/my_progress.php" method="post">
				<fieldset>
					Date <?php date_default_timezone_set('America/Los_Angeles'); echo "<input type=\"text\" id='date' name=\"time\" value=\"".date("Y-m-d")."\"/> (yyyy-mm-dd)<br/>";?>
					<input type="checkbox" name="stance"/>Stance <span class="move"></span><br/>
					<input type="checkbox" name="step_slide"/>Step and slide <span class="move" id="step_and_slide"></span><br/>
					<input type="checkbox" name="shadowbox"/>Shadowbox <span id="shadowbox" class="move"></span><br/>
					<input type="checkbox" name="jab"/>Jab <span id="jab" class="move"></span><br/>
					<input type="checkbox" name="cross"/>Cross <span id="cross" class="move"></span><br/>
					<input type="checkbox" name="hook"/>Hook <span id="hook" class="move"></span><br/>
					<input type="checkbox" name="h_elbow"/>Horizontal elbow <span id="h_elbow" class="move"></span><br/>
					<input type="checkbox" name="dr_elbow"/>Diagonal rising elbow <span id="dr_elbow" class="move"></span><br/>
					<input type="checkbox" name="teep"/>Teep <span id="teep" class="move"></span><br/>
					<input type="checkbox" name="round"/>Round kick <span id="round" class="move"></span><br/>
					<input type="checkbox" name="skip_knee"/>Skip knee <span id="skip_knee" class="move"></span><br/>
					<input type="checkbox" name="straight_knee"/>Straight knee <span id="straight_knee" class="move"></span><br/>
					<input type="checkbox" name="four_count_1"/>Four count one <span id="four_1" class="move"></span><br/>
					<input type="checkbox" name="four_count_2"/>Four count two <span id="four_2" class="move"></span><br/>
					<input type="checkbox" name="four_count_3"/>Four count three <span id="four_3" class="move"></span><br/>
					<input type="checkbox" name="four_count_4"/>Four count four <span id="four_4" class="move"></span><br/>
					<input type="checkbox" name="pillar_d"/>Pillar defense <span id="piller" class="move"></span><br/>
					<input type="checkbox" name="parry_d"/>Parry defense <span id="parry" class="move"></span><br/>
					<input type="checkbox" name="tight_cover_d"/>Tight cover defense <span id="tight_cover" class="move"></span><br/>
					Notes<br/><textarea id='notes' rows='5' cols='100'></textarea><br/>
					<input type="submit" onclick="process_form()"/>
				</fieldset>
			</form>
			<h2>Workout Logs</h2>
			<div id="log">
			</div>
		</div>
		
	</body>
</html>