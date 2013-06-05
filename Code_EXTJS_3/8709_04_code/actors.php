<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

include "db.php";

$command = "";
$out = "";
$query = "";

if (isset($_POST["query"])) {
	$query = $_POST["query"];
}

$out = GetMovies($query);

echo utf8_encode($out);

function GetMovies($query) {
    
  $retVal = "[]";
  
  $conn = OpenDbConnection();

  $sql ="SELECT actor_id, concat_ws(' ',first_name,last_name) name FROM `sakila`.`actor`";
  if (strlen($query) > 0) {
	$sql .= " where first_name like '" . $query . "%' or last_name like '" . $query . "%'"; 
  }
	
	$conn = OpenDbConnection();   
	
	$result = mysql_query($sql);   
	
	$num = mysql_numrows($result);   
	
	$i = 0;   
	
	$movies = array("count" => $num, "actors" => array());
	
	while ($row = mysql_fetch_assoc($result)) {    
		$movies["actors"][$i] = $row;    
		$i++;  
	}   
	
	CloseDbConnection($conn); 
	
	return json_encode($movies); 
}

?>