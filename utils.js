function set_user_cookie() {
	var username_field = document.getElementById("user_name");
	document.cookie = "user="+username_field.value;
}
function setUrl(url) {
	location.href = url;
}
function login_or_redirect() {
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
}

function log_out() {
	document.cookie = 'user=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	window.location.href = "http://pic.ucla.edu/~mdavis17/final_project/home.php";
}