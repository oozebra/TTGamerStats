<?php

class Match {
	
public $m_id;
public $m_p1;
public $m_p2;
public $m_win;
public $m_loss;
public $m_score;     //scores_csv	
public $e_id;  

}



function getEventMatch($e_id){
	
	
$url = "https://api.challonge.com/v1/tournaments/".$e_id."/matches.json?api_key=OgwPvxZAGKPyjjMNrudniDEgcQz8ny1ZAjJcdBGO";
$json = file_get_contents($url);
$arr = json_decode($json);
$store = [];


foreach ($arr as $value){
	
	$temp = new Match();
	
$temp->m_id = $value->match->id;
$temp->m_p1 = $value->match->player1_id;
$temp->m_p2 = $value->match->player2_id;
$temp->m_win = $value->match->player1_id;
$temp->m_loss = $value->match->player1_id;
$temp->m_score  = $value->match->scores_csv;
$temp->e_id  = $value->match->tournament_id;	
	
	
$store[] = $temp;	
	
}
	
	
return $store;	
}

?>


<?php




//var_dump(getEventMatch(1131780));


?>