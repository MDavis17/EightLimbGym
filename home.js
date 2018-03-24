function ajax_update() {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function () 
	{
		if (xhr.readyState == 4 && xhr.status == 200) 
		{
			var result = xhr.responseText;
			document.getElementById('num_nak').innerHTML = ""+result;
		}
	}	
	xhr.open("GET", "http://pic.ucla.edu/~mdavis17/final_project/num_nak.php",true);
	xhr.send(null);
}

setInterval(ajax_update,250);