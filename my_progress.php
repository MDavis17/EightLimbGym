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
			<div id="progress_bar"><div id="progress_fill">&nbsp</div></div>
				
			<div id="progress_div">
				Requirements for white Prajiet Test
				<!-- <ul>
					<li>Stance: <span class="move"></span></li>
					<li>Step and slide: <span class="move" id="step_and_slide"></span></li>
					<li>Shadowbox: <span id="shadowbox" class="move"></span></li>
					<li>Jab: <span id="jab" class="move"></span></li>
					<li>Cross: <span id="cross" class="move"></span></li>
					<li>Hook: <span id="hook" class="move"></span></li>
					<li>Horizontal elbow: <span id="h_elbow" class="move"></span></li>
					<li>Diagonal rising elbow: <span id="dr_elbow" class="move"></span></li>
					<li>Teep: <span id="teep" class="move"></span></li>
					<li>Round kick: <span id="round" class="move"></span></li>
					<li>Skip knee: <span id="skip_knee" class="move"></span></li>
					<li>Straight knee: <span id="straight_knee" class="move"></span></li>
					<li>Four count 1: <span id="four_1" class="move"></span></li>
					<li>Four count 2: <span id="four_2" class="move"></span></li>
					<li>Four count 3: <span id="four_3" class="move"></span></li>
					<li>Four count 4: <span id="four_4" class="move"></span></li>
					<li>Pillar defense: <span id="piller" class="move"></span></li>
					<li>Parry defense: <span id="parry" class="move"></span></li>
					<li>Tight cover defense: <span id="tight_cover" class="move"></span></li>
				</ul> -->
			</div>
			<form id="form" action="http://pic.ucla.edu/~mdavis17/final_project/my_progress.php" method="get">
				<!-- // $field1 = "user";
	// $field2 = "time";
	// $field3 = "stance";
	// $field4 = "step_slide";
	// $field5 = "shadowbox";
	// $field6 = "jab";
	// $field7 = "cross";
	// $field8 = "hook";
	// $field9 = "h_elbow";
	// $field10 = "dr_elbow";
	// $field11 = "teep";
	// $field12 = "round";
	// $field13 = "skip_knee";
	// $field14 = "straight_knee";
	// $field15 = "four_count_1";
	// $field16 = "four_count_2";
	// $field17 = "four_count_3";
	// $field18 = "four_count_4";
	// $field19 = "pillar_d";
	// $field20 = "parry_d";
	// $field21 = "tight_cover_d";
	// $field22 = "Wai_q";
	// $field23 = "Ka_Kap_q";
	// $field24 = "Mai_Ka_Kap_q";
	// $field25 = "Sawadee_Ka_Kap_q";
	// $field26 = "Teep_q";
	// $field27 = "Sawk_q";
	// $field28 = "Tang_q"; -->
	
	
	
	
	
	
				<fieldset>
					Date<input type="date" name="time"/></br>
					<input type="checkbox" name="stance"/>Stance <span class="move"></span></br>
					<input type="checkbox" name="step_slide"/>Step and slide <span class="move" id="step_and_slide"></span></br>
					<input type="checkbox" name="shadowbox"/>Shadowbox <span id="shadowbox" class="move"></span></br>
					<input type="checkbox" name="jab"/>Jab <span id="jab" class="move"></span></br>
					<input type="checkbox" name="cross"/>Cross <span id="cross" class="move"></span></br>
					<input type="checkbox" name="hook"/>Hook <span id="hook" class="move"></span></br>
					<input type="checkbox" name="h_elbow"/>Horizontal elbow <span id="h_elbow" class="move"></span></br>
					<input type="checkbox" name="dr_elbow"/>Diagonal rising elbow <span id="dr_elbow" class="move"></span></br>
					<input type="checkbox" name="teep"/>Teep <span id="teep" class="move"></span></br>
					<input type="checkbox" name="round"/>Round kick <span id="round" class="move"></span></br>
					<input type="checkbox" name="skip_knee"/>Skip knee <span id="skip_knee" class="move"></span></br>
					<input type="checkbox" name="straight_knee"/>Straight knee <span id="straight_knee" class="move"></span></br>
					<input type="checkbox" name="four_count_1"/>Four count 1 <span id="four_1" class="move"></span></br>
					<input type="checkbox" name="four_count_2"/>Four count 2 <span id="four_2" class="move"></span></br>
					<input type="checkbox" name="four_count_3"/>Four count 3 <span id="four_3" class="move"></span></br>
					<input type="checkbox" name="four_count_4"/>Four count 4 <span id="four_4" class="move"></span></br>
					<input type="checkbox" name="pillar_d"/>Pillar defense <span id="piller" class="move"></span></br>
					<input type="checkbox" name="parry_d"/>Parry defense <span id="parry" class="move"></span></br>
					<input type="checkbox" name="tight_cover_d"/>Tight cover defense <span id="tight_cover" class="move"></span></br>
					<!-- Wai<input type="text" name="wai_q"/></br>
					Ka/Kap<input type="text" name="ka_kap_q"/></br>
					Mai Ka/Kap<input type="text" name="mai_ka_kap_q"/></br>
					Sawadee Ka/Kap<input type="text" name="sawadee_ka_kap_q"/></br>
					Teep<input type="text" name="teep_q"/></br>
					Sawk<input type="text" name="sawk_q"/></br>
					Tang<input type="text" name="tang_q"/></br> -->
					<input type="submit" onclick="process_form()"/>
				</fieldset>
			</form>
		</div>
		
	</body>
</html>