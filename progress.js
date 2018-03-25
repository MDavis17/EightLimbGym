function ajax_update_progress(query_str) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function () 
	{
		if (xhr.readyState == 4 && xhr.status == 200) 
		{
			var result = xhr.responseText;
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
	for(let i = 0; i < spans.length; i++) {
		spans[i].innerHTML = parseInt(move_nums[i]);
	}
}

setInterval(ajax_update_progress,500);