<?php 
ini_set("display_errors", true);
ini_set("html_errors", true);

$out = "";

$out = GetRentals();

echo utf8_encode($out);

function GetRentals() {   

	$rentals = "{'rentals':[";
	$rentals .= "{ month: 'May 2005', payments: 4824.43, filmsrented: 612 },"; 
	$rentals .= "{ month: 'June 2005', payments: 9631.88, filmsrented: 1020 },";
    $rentals .= "{ month: 'July 2005', payments: 28373.89, filmsrented: 4788 },";
    $rentals .= "{ month: 'August 2005', payments: 24072.13, filmsrented: 3944 },";
    $rentals .= "{ month: 'September 2005', payments: 33475.55, filmsrented: 5730 }";
	$rentals .= "]}";
	 
	return $rentals;
} 
?>