<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

include "db.php";

$out = "";
$query = "";
$sort = "title";
$dir = "ASC";

if (isset($_REQUEST["sort"])) {
	$sort = $_REQUEST["sort"];
}
if (isset($_REQUEST["dir"])) {
	$dir = $_REQUEST["dir"];
}

$out = GetMovies($sort, $dir);

echo utf8_encode($out);

function GetMovies($sort, $dir) {

	$sql ="SELECT film_id, title, description, release_year, rating, special_features FROM `sakila`.`film`";
	$sql .= " ORDER BY " . $sort . " " . $dir;
	
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