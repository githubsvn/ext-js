<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

include "db.php";

$command = "";
$out = "";
$query = "";

if (isset($_REQUEST["cmd"])) {
	$command = $_REQUEST["cmd"];
}
if (isset($_REQUEST["query"])) {
	$query = $_REQUEST["query"];
}


$out = GetMovies($query);

echo utf8_encode($out);

function GetMovies($query) {
    
  $retVal = "[]";
  
  $conn = OpenDbConnection();

  $sql ="SELECT film_id, title, description, release_year, rating, special_features FROM `sakila`.`film`";
  if (strlen($query) > 0) {
	$sql .= " where title like '" . $query . "%'"; 
  }
	
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