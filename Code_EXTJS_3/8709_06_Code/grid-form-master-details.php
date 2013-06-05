<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

include "db.php";

$out = "";

$out = GetMovies();

echo utf8_encode($out);

function GetMovies() {

	$sql =" SELECT f.film_id, f.title, f.rating, f.length, f.rental_rate price FROM film f limit 100";
	
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

?>