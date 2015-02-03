

function getSignIn(){
	
var signIn = "  <form name=\"quick_login\" action=\"php/login.php\" method=\"POST\" >"
			+"  <input name=\"submit\" type=\"image\" id=\"goer\" src=\"../img/go.gif\" class=\"go\" ALT=\"SUBMIT\" >"
			+"	<span class=\"loginMenu\">"
			+"	Username: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Password:<br /> "
			+"	<input type=\"text\" maxlength=\"12\" name=\"username\"/ > &nbsp; <input type=\"text\" maxlength=\"12\" name=\"password\"/> </span> </form>";

	
	
	document.getElementById("reg_log").innerHTML= signIn;	
	
	document.getElementById("goer").style.cursor = "pointer";
	
	
}


function signOut(){

if (confirm("Do you want to log out?") ){ 
document.cookie="username=;expires=Thu, 01 Jan 1970 00:00:01 GMT;";
changeLogInfo();
window.location.href="../home.html";

 }

}


function userType(){
	var usertype = "";
	
	var arr= document.cookie.split(";");
	
	for (var t in arr){
	
	if (/access=/.test(arr[t])){
		
		return arr[t].replace("access=", "");
		
	}	
		
	}
	
	return "guest";
	
	
	
}