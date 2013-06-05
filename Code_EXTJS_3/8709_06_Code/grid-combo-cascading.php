<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

include "db.php";

$action = "";
$out = "";
$category = "";


if (isset($_REQUEST["action"])) {
	$action = $_REQUEST["action"];
}
if (isset($_REQUEST["category"])) {
	$category = $_REQUEST["category"];
}



switch ($action) {

  case "categories":
	$out = GetCategories();
    break;		
  case "movies":
	$out = GetMovies($category);
    break;		
}

echo utf8_encode($out);

function GetMovies($category) {

	$sql ="SELECT f.title, c.name category, f.rating, f.length, f.rental_rate price FROM film f join film_category fc on (f.film_id = fc.film_id) ";
	$sql .= "join category c on (fc.category_id = c.category_id) ";
	$sql .= "where fc.category_id = " . $category . ";";
	
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

function GetCategories() {

	$sql ="SELECT category_id, name FROM category c;";
	
	$conn = OpenDbConnection();   
	
	$result = mysql_query($sql);   
	
	$num = mysql_numrows($result); 
	
	$i = 0;   
	
	$categoriesData = array("count" => $num, "categories" => array());
	
	while ($row = mysql_fetch_assoc($result)) {    
		$categoriesData["categories"][$i] = $row;    
		$i++;  
	}   
	
	CloseDbConnection($conn); 
	
	return json_encode($categoriesData); 
}

?>