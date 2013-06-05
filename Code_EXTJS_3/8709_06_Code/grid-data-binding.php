<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

include "db.php";

$out = "";
$sort = "title";
$dir = "ASC";
$start = 0;
$limit = 15;

if (isset($_REQUEST["sort"])) {
	$sort = $_REQUEST["sort"];
}
if (isset($_REQUEST["dir"])) {
	$dir = $_REQUEST["dir"];
}
if (isset($_REQUEST["start"]) && $_REQUEST["start"] != "") {
	$start = $_REQUEST["start"];
}
if (isset($_REQUEST["limit"])) {
	$limit = $_REQUEST["limit"];
}

$out = GetMovies($start, $limit, $sort, $dir);

echo utf8_encode($out);

function GetMovies($start, $limit, $sort, $dir) {
    
	  $retVal = "[]";
	  
	  $sql ="SELECT COUNT(FID) FROM `sakila`.`nicer_but_slower_film_list`";
	  
	  $conn = OpenDbConnection();

	  $result = mysql_query($sql);  

	  $row = mysql_fetch_row($result);
	  
	  $num = $row[0];

	  $sql ="SELECT * FROM `sakila`.`nicer_but_slower_film_list`";
	  $sql .= " ORDER BY " . $sort . " " . $dir . " LIMIT " . $start . ", " . $limit;
	
	$result = mysql_query($sql); 
	
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