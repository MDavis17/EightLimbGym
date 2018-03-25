function ajax_update_progress(query_str) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function () 
	{
		if (xhr.readyState == 4 && xhr.status == 200) 
		{
			var result = xhr.responseText;
			console.log("here");
			update_progress(result);
		}
	}	
	xhr.open("GET", "http://pic.ucla.edu/~mdavis17/final_project/update_progress.php?"+query_str,true);
	xhr.send(null);
}

function process_form() {
	var form = document.getElementById("form");
	var pairs = [];
	for(let i=0; i < form.elements.length; i++) {
		var element = form.elements[i];
		if(element.checked) {
			pairs.push(encodeURIComponent(element.name)+"="+encodeURIComponent(element.value));
		}
		// console.log(encodeURIComponent(element.name)+"="+encodeURIComponent(element.value));	
	}
	var query_str = pairs.join("&");
	//console.log(query_str);
	ajax_update_progress(query_str);
}

function update_progress(move_list) {
	var move_nums = move_list.split(",");
	var spans = document.getElementsByClassName("move");
	var points_gained = 0;
	var points_per_move = 5;
	var points_needed = points_per_move*spans.length;
	console.log(points_needed);
	for(let i = 0; i < spans.length; i++) {
		spans[i].innerHTML = parseInt(move_nums[i]);
		points_gained += Math.min(points_per_move,parseInt(move_nums[i]));
	}
	console.log(points_gained);
	var progress_fill_width = Math.min(parseInt((parseFloat(points_gained)/points_needed)*100),100);
	console.log(parseInt((parseFloat(points_gained)/points_needed)*100));
	console.log(progress_fill_width);
	document.getElementById("progress_fill").style.width = progress_fill_width+"%";
}

setInterval(ajax_update_progress,500);