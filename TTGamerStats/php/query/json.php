<?php


function getTournamentIds(){

$url = "https://api.challonge.com/v1/tournaments.json?api_key=OgwPvxZAGKPyjjMNrudniDEgcQz8ny1ZAjJcdBGO";
$json = file_get_contents($url);
$arr = json_decode($json);
foreach ($arr as $value){
$id = $value->tournament->id."<br/><br/> ";
echo $id;}
}


function getParticipants( $id ){
	
$url = "https://api.challonge.com/v1/tournaments/".$id."/participants.json?api_key=OgwPvxZAGKPyjjMNrudniDEgcQz8ny1ZAjJcdBGO";
$json = file_get_contents($url);
$arr = json_decode($json);
foreach ($arr as $value){
	
echo $value->participant->id."<br/> ";
echo $value->participant->name."<br/> ";
echo $value->participant->seed."<br/> ";
echo $value->participant->final_rank."<br/><br/> ";
		
}	
}


function getMatches($id){
	
$url = "https://api.challonge.com/v1/tournaments/".$id."/matches.json?api_key=OgwPvxZAGKPyjjMNrudniDEgcQz8ny1ZAjJcdBGO";
$json = file_get_contents($url);
$arr = json_decode($json);

foreach ($arr as $value){
	
echo $value->match->scores_csv."<br/> ";
echo getPaticipantName($value->match->tournament_id, $value->match->loser_id)."<br/> ";
echo getPaticipantName($value->match->tournament_id,  $value->match->winner_id)."<br/> ";
echo $value->match->player1_id."<br/> ";
echo $value->match->player2_id."<br/> ";
echo $value->match->tournament_id."<br/><br/> ";
		
}	
	
	
}


function getPaticipantName($tournament_id, $id ){
	
$url = "https://api.challonge.com/v1/tournaments/".$tournament_id."/participants.json?api_key=OgwPvxZAGKPyjjMNrudniDEgcQz8ny1ZAjJcdBGO";
$json = file_get_contents($url);
$arr = json_decode($json);

foreach ($arr as $value){	
if ($value->participant->id == $id) {
	
return $value->participant->name;	
	
}
	
}	
	
}










?>










<?php


?>