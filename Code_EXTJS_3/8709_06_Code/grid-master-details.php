<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

include "db.php";

$action = "";
$out = "";
$actor = "";


if (isset($_REQUEST["action"])) {
	$action = $_REQUEST["action"];
}
if (isset($_REQUEST["actor"])) {
	$actor = $_REQUEST["actor"];
}



switch ($action) {

  case "actors":
	$out = GetActors();
    break;		
  case "movies":
	$out = GetMovies($actor);
    break;		
}

echo utf8_encode($out);

function GetMovies($actor) {

	$sql =" SELECT f.title, f.rating, f.length, f.rental_rate price FROM film f ";
	$sql .= "join film_actor fa on (f.film_id = fa.film_id) ";
	$sql .= "join actor a on (fa.actor_id = a.actor_id) ";
	$sql .= "where a.actor_id = " . $actor;
	
	$conn = OpenDbConnection();   
	
	$result = mysql_query($sql);   
	
	$num = mysql_numrows($result); 
	
	$i = 0;   
	
	$moviesData = array("count" => $num, "movies" => array());
	
	while ($row = mysql_fetch_assoc($result)) {    
		$moviesData["movies"][$i] = $row;    
		$i++;  
	}   
	
	CloseDbConnection($conn); 
	
	return json_encode($moviesData); 
}

function GetActors() {

	$sql ="SELECT actor_id, first_name, last_name FROM actor;";
	
	$conn = OpenDbConnection();   
	
	$result = mysql_query($sql);   
	
	$num = mysql_numrows($result); 
	
	$i = 0;   
	
	$actorsData = array("count" => $num, "actors" => array());
	
	while ($row = mysql_fetch_assoc($result)) {    
		$actorsData["actors"][$i] = $row;    
		$i++;  
	}   
	
	CloseDbConnection($conn); 
	
	return json_encode($actorsData); 
}

?>