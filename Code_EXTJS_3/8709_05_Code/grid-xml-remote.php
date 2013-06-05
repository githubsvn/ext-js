<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

include "db.php";

$out = "";
$query = "";


if (isset($_POST["query"])) {
	$query = $_POST["query"];
}

header("content-type: text/xml");
$out .= "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";


$out = GetMovies($query);



echo utf8_encode($out);

function GetMovies($query) {
    
  $retVal = "<movies>";
  
  $conn = OpenDbConnection();

  $sql ="SELECT film_id, title, description, release_year, rating, special_features FROM `sakila`.`film`";
  if (strlen($query) > 0) {
	$sql .= " where title like '" . $query . "%'"; 
  }
	
	$conn = OpenDbConnection();   
	
	$result = mysql_query($sql);
	
	while ($row = mysql_fetch_assoc($result)) { 
		$retVal .= "<movie>";
		$retVal .= "<id>" . $row["film_id"] . "</id>";  
		$retVal .= "<title>" . $row["title"] . "</title>";  
		$retVal .= "<year>" . $row["release_year"] . "</year>"; 
		$retVal .= "<rating>" . $row["rating"] . "</rating>"; 
		$retVal .= "</movie>";
	} 

	$retVal .= "</movies>";	
	
	CloseDbConnection($conn); 
	
	return $retVal; 
}

?>