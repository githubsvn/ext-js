﻿<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

include "db.php";

$out = "";
$xaction = "";
$data = "";

if (isset($_REQUEST["xaction"])) {
	$xaction = $_REQUEST["xaction"];
}

if (isset($_POST["customers"])) {
	$customers = $_POST["customers"];
}

switch ($xaction) {

  case "read":
    $out = GetCustomers();
    break;
  case "cities":
    $out = GetCities();
    break;
  case "update":
   $out = json_encode(array("success" => true, "customers" => json_decode($customers)));
    break;
}

echo utf8_encode($out);

function GetCities() {
    
  $retVal = "[]";
  
  $conn = OpenDbConnection();

  $sql ="SELECT city_id, city FROM `sakila`.`city` WHERE country_id = 103";
  	
	$conn = OpenDbConnection();   
	
	$result = mysql_query($sql);   
	
	$num = mysql_numrows($result); 
	
	$i = 0;   
	
	$citiesData = array("count" => $num, "cities" => array());
	
	while ($row = mysql_fetch_assoc($result)) {    
		$citiesData["cities"][$i] = $row;    
		$i++;  
	}   
	
	CloseDbConnection($conn); 
	
	return json_encode($citiesData); 
}

function GetCustomers() {
    
  $retVal = "[]";
  
  $conn = OpenDbConnection();

  $sql ="SELECT * FROM `sakila`.`customer_list` WHERE country = 'United States'";
  	
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