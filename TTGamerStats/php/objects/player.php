<?php

class Participant{

public $e_id;
public $p_rank	;
public $p_id;
public $p_name	;
public $p_seed;
public $userID;
	
	
	
	
}




function getEventPart($e_id){
	
	
$url = "https://api.challonge.com/v1/tournaments/".$e_id."/participants.json?api_key=OgwPvxZAGKPyjjMNrudniDEgcQz8ny1ZAjJcdBGO";
$json = file_get_contents($url);
$arr = json_decode($json);
$store = [];


//var_dump($arr[0]->participant->id);

foreach ($arr as $value){
$temp = new Participant();	


$temp->e_id	= $e_id;	
$temp->p_rank	= $value->participant->final_rank;
$temp->p_id =   $value->participant->id;
$temp->p_name	= $value->participant->name;
$temp->p_seed = $value->participant->seed;




$store[] = $temp;	
}
	
return $store;	
}

function getWinner($e_id){
	
$arr = getEventPart($e_id);

foreach ( $arr as $temp ){
	
if ($temp->p_rank == 1){
	
	return $temp->p_id;
	
}	
	
	
}	
	
	
	
	
}



?>


<?php




//var_dump(getEventPart(1131780));


?>