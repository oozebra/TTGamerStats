<?php
include 'db/connect.php';


//var_dump( $_POST['username']);

$dbh = openDb(); 

try{
       
	$sql = ' SELECT * FROM `user`';
	   
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   //ar_dump( $results);
   
   foreach ($results as $row) {
   if ($row['username']== $_POST['username']){
	   
   if ($row['password']== $_POST['password']){
	
	if (isset($_COOKIE['thekey'])){		
    $_COOKIE['username'] =  $_POST['username'];
	}
	else {
		
		$cookie_name= "username";
	$cookie_value= $row['username'];
		
	setcookie($cookie_name, $cookie_value);
 	}
	$cookie_access= "access";
	$cookie_acclvl= $row['accessLevel'];
	
	setcookie($cookie_access, $cookie_acclvl); 	
	closeDb($dbh);
	
	
	if ($row['accessLevel'] == "org"){
	echo "<script>window.location.href=\"organizer.php\";</script>";}
	else if ($row['accessLevel'] == "admin"){		
		echo "<script>window.location.href=\"admin.php\";</script>";}
		
	else if ($row['accessLevel'] == "user"){		
		echo "<script>window.location.href=\"../user.html\";</script>";}
		
	
	
	
	//header("Location: ../home.html");
   }
   
   
   }
   
   }
}
   catch (Exception $e){
   
   echo " Error contacting the database";
   }



echo " Failed";


?>