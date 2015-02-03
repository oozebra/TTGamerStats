
function setCookie(username, type) {
    document.cookie="username="+username+"; type="+type+"; path=/";
}

function pausecomp(millis)
 {
  var date = new Date();
  var curDate = null;
  do { curDate = new Date(); }
  while(curDate-date < millis);
}

function getCookie() {
var arr = document.cookie.split(";");
var name="";
for (var t in arr){
	if (/username=/.test(arr[t])){
		name=arr[t].replace("username=", "");
	}
	
}

	
return	(name!="") ? name : "Error"; 

   
}

function changeLogInfo() {
    
	if (getCookie()!="Error"){
		
		document.getElementById("reg_log").innerHTML="<img src=\"../img/head.jpg\" class=\"userIcon\"/>"+getCookie()+"<button id=\"logout\" type=\"button\" onclick= \"signOut()\"class=\"button log\" style=\"margin-left:22px;\">Log Out</button>";
	}
	
	else{
		
			 
		
		var button = "<button id=\"login_b\" type=\"button\" onclick= \"getSignIn()\"class=\"button log\">Login</button>"
					+"<button id=\"reg_b\" type=\"button\"  class=\"button reg\">Register</button>";
		
		document.getElementById("reg_log").innerHTML= button;
		
		
}
}
