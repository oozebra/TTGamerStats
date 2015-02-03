
function getNewTourneys(){
		
var xmlhttp = new XMLHttpRequest();
var url = "php/get-data.php";
  var myArr=[];
  
  var txt = "";

  
xmlhttp.open("GET", url, true);
xmlhttp.send();



for(var t in myArr){
	
txt += MyArr[t]+"<br /> ";
	
}

	
document.getElementById("result").innerHTML= txt;	
	
	
}


function loadXMLDoc()
{
var url = "php/get-data.php";	
	
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
	var MyArr=xmlhttp.responseText;
	
	  
	  
 
	  
	  
	  
	  
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("placehere").innerHTML= MyArr[1];
    }
}
xmlhttp.open("GET",url,true);
xmlhttp.send();
}