<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

include "db.php";

$out = "";

$out = GetSales();

echo utf8_encode($out);

function GetSales() {

	$sql ="SELECT category, total_sales FROM sales_by_film_category;";
	
	$conn = OpenDbConnection();   
	
	$result = mysql_query($sql);   
	
	$num = mysql_numrows($result); 
	
	$i = 0;   
	
	$salesData = array("count" => $num, "sales" => array());
	
	while ($row = mysql_fetch_assoc($result)) {    
		$salesData["sales"][$i] = $row;    
		$i++;  
	}   
	
	CloseDbConnection($conn); 
	
	return json_encode($salesData); 
}

?>