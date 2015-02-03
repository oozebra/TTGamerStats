<?php
require(dirname(__DIR__) . "/db/connect.php");


function getUsersArr(){
	
$dbh = openDb(); 

try{
       
	$sql = ' SELECT * FROM `user`';
	 $arr = [];  
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  

foreach (  $results as $row ){
	
	$arr[]=$row['username'];
	
}
   
   return $arr;
   
   
   closeDb($dbh);
   
   }
   catch (Exception $e){
   
   echo " Error contacting the database";
   }



}


	
	
	
}











?>