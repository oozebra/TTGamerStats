<?php
require(dirname(__DIR__) . "/objects/player.php");
require(dirname(__DIR__) . "/objects/match.php");
require(dirname(__DIR__) . "/query/json.php");
require(dirname(__DIR__) . "/db/connect.php");
class Event{
	
public $e_id;		//id	
public $e_name;
public $e_date ;// completed_at
public $e_game;
public $e_count;
public $e_winner;
public $e_disc;
public $e_type ; //tournament_type	
public $e_img ; //live_image_url
public $e_user_id ; //event holder
public $e_org_id ; //event holder
public $e_part; //array of participants
public $e_match;	// array of matches
	
}



function getTournaments(){
	
$store = [];	
$url = "https://api.challonge.com/v1/tournaments.json?api_key=OgwPvxZAGKPyjjMNrudniDEgcQz8ny1ZAjJcdBGO";
$json = file_get_contents($url);
$arr = json_decode($json);
	
foreach ($arr as $value){
$temp = new Event();	

$temp->e_org_id ="1111111";
$temp->e_user_id ="202222";	
$temp->e_id = $value->tournament->id;
$temp->e_name = $value->tournament->name;
$temp->e_date  = $value->tournament->completed_at;
$temp->e_game = $value->tournament->game_name;
$temp->e_count= $value->tournament->participants_count;
$temp->e_winner =  getPaticipantName($value->tournament->id, getWinner( $value->tournament->id));
$temp->e_disc  = $value->tournament->description;
$temp->e_type  = $value->tournament->tournament_type;
$temp->e_img  = $value->tournament->live_image_url;
$temp->e_part  = getEventPart($temp->e_id);
$temp->e_match  = getEventMatch($temp->e_id);

if (!checkDbTours($temp->e_id)){
$store[] = $temp;
}
}


return $store;
}	
	
	
	

function addTourToDB($tournament){
	
try{

$dbh  = openDb();



foreach($tournament as $value){

$e_id =		$value->e_id ;
$e_name = 	$value->e_name ;
$e_date = 	$value->e_date  ;
$e_game = 	$value->e_game;
$e_disc = 	$value->e_disc  ;
$e_type = 	$value->e_type ;
$e_img  = 	$value->e_img  ;
$e_user_id= $value->e_user_id ;
$e_org_id = $value->e_org_id ;
$e_count =  $value->e_count;
$e_winner = $value->e_winner;
$tour_id   = '';

//insert Tournament
$stmt = $dbh->prepare("INSERT INTO event(`e_id`, `e_name`, `e_date`, `e_game`, `e_desc`, `e_type`, `e_img`, `tour_id`, `e_count`, `e_winner`) VALUES(:e_id, :e_name, :e_date, :e_game, :e_desc, :e_type, :e_img, :tour_id, :e_count, :e_winner)");


$stmt->bindParam(':e_id', $e_id);

$stmt->bindParam(':e_name', $e_name);
$stmt->bindParam(':e_date', $e_date);
$stmt->bindParam(':e_game', $e_game);
$stmt->bindParam(':e_desc',  $e_disc);
$stmt->bindParam(':e_type', $e_type);
$stmt->bindParam(':e_img', $e_img);
$stmt->bindParam(':tour_id', $tour_id);
$stmt->bindParam(':e_count', $e_count);
$stmt->bindParam(':e_winner', $e_winner);

$stmt->execute();
//if($stmt->execute()) {echo "done"; }else {die ("failed making event "); } ;


foreach ($value->e_part as $row){

$e_id =		$row->e_id ;
$p_id =		$row->p_id ;
$p_rank = 	$row->p_rank  ;
$p_name = 	$row->p_name;
$p_seed = 	$row->p_seed  ;

$stmt = $dbh->prepare("INSERT INTO participant(e_id, p_id, userID, p_rank,p_name, p_seed) VALUES (:e_id, :p_id, :userID, :p_rank, :p_name, :p_seed)");

$stmt->bindParam(':e_id', $e_id);
$stmt->bindParam(':p_id', $p_id);
$stmt->bindParam(':userID', $e_user_id);
$stmt->bindParam(':p_rank', $p_rank);
$stmt->bindParam(':p_name', $p_name);
$stmt->bindParam(':p_seed', $p_seed);

$stmt->execute();

}

 
foreach ($value->e_match as $row){

$e_id =		$row->e_id ;
$m_id =		$row->m_id ;
$m_p1 =		$row->m_p1 ;
$m_p2 = 	$row->m_p2 ;
$m_win = 	$row->m_win;
$m_loss = 	$row->m_loss ;
$m_score =  $row->m_score ;



$stmt = $dbh->prepare("INSERT INTO `match`(`e_id`, `m_id`, `m_p1`, `m_p2`, `m_win`, `m_loss`, `m_score`) VALUES (:e_id, :m_id, :m_p1, :m_p2, :m_win, :m_loss,:m_score)");

$stmt->bindParam(':e_id', $e_id);
$stmt->bindParam(':m_id', $m_id);
$stmt->bindParam(':m_p1', $m_p1);
$stmt->bindParam(':m_p2', $m_p2);
$stmt->bindParam(':m_win', $m_win);
$stmt->bindParam(':m_loss', $m_loss);
$stmt->bindParam(':m_score', $m_score);


$stmt->execute();

}





}

closeDb($dbh);

}

catch (PDOException $e){ $e->getMessage();}

}	








function checkDbTours($e_id){
	
		
try{

$dbh  = openDb();
	
$stmt = $dbh->prepare("SELECT `e_id` FROM `event`");

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
 
foreach ($results as $row){
	
 if ($row['e_id'] == $e_id) {return true;}
 
} 

return false;
 
}
 
catch (PDOException $e){  $e->getMessage();} 


}



?>






<?php

// echo dirname(__DIR__);

 addTourToDB(getTournaments());




//var_dump(checkDbTours('1131780'));



?>