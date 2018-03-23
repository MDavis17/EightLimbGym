function set_user_cookie() {
	var username_field = document.getElementById("user_name");
	document.cookie = "user="+username_field.value;
}
function setUrl(url) {
	location.href = url;
}

function log_out() {
	document.cookie = 'user=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	window.location.href = "http://pic.ucla.edu/~mdavis17/final_project/home.php";
}