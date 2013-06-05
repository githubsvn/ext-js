<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

include "db.php";

$out = "";
$xaction = "";
$data = "";

if (isset($_REQUEST["xaction"])) {
	$xaction = $_REQUEST["xaction"];
}


switch ($xaction) {

  case "load":
    $out = GetCustomers();
    break;

}

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
	
	$customersData = "";
	
	while ($row = mysql_fetch_assoc($result)) {    
		$customersData .= $row["last_name"] . ", " . $row["first_name"] . "<br/>";    
		$i++;  
	}   
	
	CloseDbConnection($conn); 
	
	return $customersData; 
}

?>