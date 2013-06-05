<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

include "db.php";

$out = "";
$data = "";

$out = GetCustomers();

echo utf8_encode($out);

function GetCustomers() {
    
	$retVal = "[]";
  
	$conn = OpenDbConnection();

	$sql ="select `cu`.`customer_id` AS `ID`,`cu`.`first_name`,`cu`.`last_name`,`a`.`phone` , `cu`.`email` ";
	$sql .=	"from `customer` `cu` join `address` `a` on (`cu`.`address_id` = `a`.`address_id`) LIMIT 100;";
  	
	$conn = OpenDbConnection();   
	
	$result = mysql_query($sql);   
	
	$num = mysql_numrows($result); 
	
	$i = 0;   
	
	$customersData = array("count" => $num, "customers" => array());
	
	while ($row = mysql_fetch_assoc($result)) {    
		$customersData["customers"][$i] = $row;    
		$i++;  
	}   
	
	CloseDbConnection($conn); 
	
	return json_encode($customersData); 
}

?>