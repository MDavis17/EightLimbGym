var cookies = document.cookie.split(";");
var logged_in = false;
for(let i = 0; i < cookies.length; i++) {
	var cookie = cookies[i].split("=");
	if(cookie[0]=="user") {
		logged_in = true;
	}
}
if(!logged_in) {
	window.location.replace("http://pic.ucla.edu/~mdavis17/final_project/login.php");
}