function ajax_update_progress(query_str) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function () 
	{
		if (xhr.readyState == 4 && xhr.status == 200) 
		{
			alert("workout recorded");
		}
	}	
	xhr.open("POST", "http://pic.ucla.edu/~mdavis17/final_project/update_progress.php",true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(query_str);
}

function ajax_update_page_progress() {
var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function () 
	{
		if (xhr.readyState == 4 && xhr.status == 200) 
		{
			var result = xhr.responseText;
			update_progress(result);
		}
	}	
	xhr.open("GET", "http://pic.ucla.edu/~mdavis17/final_project/get_progress.php",true);
	xhr.send(null);
}


function process_form() {
	var form = document.getElementById("form");
	var pairs = [];
	var moves = [];
	for(let i=0; i < form.elements.length; i++) {
		var element = form.elements[i];
		if(element.checked) {
			moves.push(element.name);
			pairs.push(encodeURIComponent(element.name)+"="+encodeURIComponent(element.value));
		}
		// console.log(encodeURIComponent(element.name)+"="+encodeURIComponent(element.value));	
	}
	var query_str = pairs.join("&");
	var date = document.getElementById("date").value;
	var move_str = moves.join(",");
	var notes = ""+document.getElementById('notes').value;
	query_str += "&time="+date+"&moves="+move_str+"&notes="+notes;
	
	ajax_update_progress(query_str);
	// ajax_update_log(date,move_str,notes);
}

function update_progress(move_list) {
	var move_nums = move_list.split(",");
	var spans = document.getElementsByClassName("move");
	var points_gained = 0;
	var points_per_move = 5;
	var points_needed = points_per_move*spans.length;
	for(let i = 0; i < spans.length; i++) {
		spans[i].innerHTML = parseInt(move_nums[i]);
		points_gained += Math.min(points_per_move,parseInt(move_nums[i]));
	}
	var progress_fill_width = Math.min(parseInt((parseFloat(points_gained)/points_needed)*100),100);
	document.getElementById("progress_fill").style.width = progress_fill_width+"%";
}

function update_log() {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function () 
	{
		if (xhr.readyState == 4 && xhr.status == 200) 
		{
			var result = xhr.responseText;
			console.log(result);
			document.getElementById("log").innerHTML = result;
		}
	}
	xhr.open("GET", "http://pic.ucla.edu/~mdavis17/final_project/get_logs.php",true);
	xhr.send(null);
}

setInterval(ajax_update_page_progress,500);
setInterval(update_log,500);