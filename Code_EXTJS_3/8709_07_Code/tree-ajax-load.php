<?php
ini_set("display_errors", true);
ini_set("html_errors", true);

$node = "";
$out = "";

if (isset($_REQUEST["node"])) {
	$node = $_REQUEST["node"];
}

switch ($node) {

	case "project":
		$out = GetProjectTree();
		break;
	case "datasources":
		$out = GetDataSources();
		break;
	case "datasets":
		$out = GetDatasets();
		break;
	case "execreports":
		$out = GetExecReports();
		break;
	case "reports":
		$out = GetReports();
		break;
	

}
echo utf8_encode($out);


function GetProjectTree() {
    
	$tree = "[{\"text\":\"Data Sources\",\"id\":\"datasources\",\"iconCls\":\"folder\",\"draggable\":false},";
	$tree .= "{\"text\":\"Datasets\",\"id\":\"datasets\",\"iconCls\":\"folder\",\"draggable\":false},";	
	$tree .= "{\"text\":\"Executive Reports\",\"id\":\"execreports\",\"iconCls\":\"folder\",\"draggable\":false},";	
	$tree .= "{\"text\":\"Reports\",\"id\":\"reports\",\"iconCls\":\"folder\",\"draggable\":false}]";
	
	return $tree; 
}

function GetDataSources() {
    
	$datasrc = "[{\"text\":\"Time and Billing System\",\"id\":\"timeandbilling\",\"leaf\":true,\"iconCls\":\"datasource\"},";
	$datasrc .= "{\"text\":\"Employee Management System\",\"id\":\"emplmanagement\",\"leaf\":true,\"iconCls\":\"datasource\"}]";	
	
	return $datasrc; 
}

function GetDatasets() {
    
	$datasets = "[{\"text\":\"Hours Worked\",\"id\":\"hrsworked\",\"leaf\":true,\"iconCls\":\"dataset\"},";
	$datasets .= "{\"text\":\"Hours Billed\",\"id\":\"hrsbilled\",\"leaf\":true,\"iconCls\":\"dataset\"},";	
	$datasets .= "{\"text\":\"Receipts\",\"id\":\"receipts\",\"leaf\":true,\"iconCls\":\"dataset\"}]";
	
	return $datasets; 
}

function GetExecReports() {
    
	$reports = "[{\"text\":\"Profitability\",\"id\":\"profitability\",\"leaf\":true,\"iconCls\":\"report\"},";
	$reports .= "{\"text\":\"Firm-Level Trends\",\"id\":\"trends\",\"leaf\":true,\"iconCls\":\"report\"}]";
	
	return $reports; 
}

function GetReports() {
    
	$reports = "[{\"text\":\"Work In Progress\",\"id\":\"workinprogress\",\"leaf\":true,\"iconCls\":\"report\"},";
	$reports .= "{\"text\":\"Utilization\",\"id\":\"utilization\",\"leaf\":true,\"iconCls\":\"report\"}]";
	
	return $reports; 
}








?>