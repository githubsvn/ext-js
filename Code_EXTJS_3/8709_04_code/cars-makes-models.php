<?php 
ini_set("display_errors", true);
ini_set("html_errors", true);

$command = $_POST["cmd"];
$out = "";

switch ($command) {

  case "makes":
    $out = GetMakes();
    break;

case "models":
	$makeId = $_POST["makeId"];
    $out = GetModels($makeId);
    break;		
}

echo utf8_encode($out);

function GetMakes() {   

	$makes = "{'makes':[";
	$makes .= "{'id':'1','name':'Acura'},"; 
	$makes .= "{'id':'2','name':'Aston Martin'},";
    $makes .= "{'id':'3','name':'Audi'},";
    $makes .= "{'id':'4','name':'BMW'},";
    $makes .= "{'id':'5','name':'Buick'},";
    $makes .= "{'id':'6','name':'Cadillac'},";
    $makes .= "{'id':'7','name':'Chevrolet'},";
    $makes .= "{'id':'8','name':'Chrysler'},";
    $makes .= "{'id':'9','name':'Dodge'},";
    $makes .= "{'id':'10','name':'Ferrari'},";
    $makes .= "{'id':'11','name':'Ford'},";
    $makes .= "{'id':'12','name':'GMC'},";
    $makes .= "{'id':'13','name':'Honda'},";
    $makes .= "{'id':'14','name':'HUMMER'},";
    $makes .= "{'id':'15','name':'Hyundai'},";
    $makes .= "{'id':'16','name':'Infiniti'},";
    $makes .= "{'id':'17','name':'Isuzu'},";
    $makes .= "{'id':'18','name':'Jaguar'},";
    $makes .= "{'id':'19','name':'Jeep'},";
    $makes .= "{'id':'20','name':'Kia'},";
    $makes .= "{'id':'21','name':'Lamborghini'},";
    $makes .= "{'id':'22','name':'Land Rover'},";
    $makes .= "{'id':'23','name':'Lexus'},";
    $makes .= "{'id':'24','name':'Lincoln'},";
    $makes .= "{'id':'25','name':'Lotus'},";
    $makes .= "{'id':'26','name':'Maserati'},";
    $makes .= "{'id':'27','name':'Mazda'},";
    $makes .= "{'id':'28','name':'Mercedes-Benz'},";
    $makes .= "{'id':'29','name':'Mercury'},";
    $makes .= "{'id':'30','name':'MINI'},";
    $makes .= "{'id':'31','name':'Mitsubishi'},";
    $makes .= "{'id':'32','name':'Nissan'},";
    $makes .= "{'id':'33','name':'Pontiac'},";
    $makes .= "{'id':'34','name':'Porsche'},";
    $makes .= "{'id':'35','name':'Rolls-Royce'},";
    $makes .= "{'id':'36','name':'Saab'},";
    $makes .= "{'id':'37','name':'Saturn'},";
    $makes .= "{'id':'38','name':'Scion'},";
    $makes .= "{'id':'39','name':'Smart'},";
    $makes .= "{'id':'40','name':'Subaru'},";
    $makes .= "{'id':'41','name':'Suzuki'},";
    $makes .= "{'id':'42','name':'Toyota'},";
    $makes .= "{'id':'43','name':'Volkswagen'},";
    $makes .= "{'id':'44','name':'Volvo'}";	
	$makes .= "]}";
	 
	return $makes;
} 

function GetModels($makeId) {   


	$models = "{'models':[";
	
	switch ($makeId) {

	  case 1:	// Acura
		$models .= "{'id':'1','name':'MDX'},"; 
		$models .= "{'id':'2','name':'RDX'},";
		$models .= "{'id':'3','name':'RL'},";
		$models .= "{'id':'4','name':'TL'},";
		$models .= "{'id':'5','name':'TSX'}";
		break;

		case 2:	// Aston Martin
			$models .= "{'id':'1','name':'DB9'},"; 
			$models .= "{'id':'2','name':'DBS'},";
			break;		
		
		
		default:	// Why do't you code the rest of the models? :)
			$models .= "{'id':'0','name':'No data found'}"; 
	}
    
	$models .= "]}";
	 
	return $models;
} 
?>