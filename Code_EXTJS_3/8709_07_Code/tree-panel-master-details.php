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
    
	$tree = "[{\"text\":\"Data Sources\",\"id\":\"datasources\",\"iconCls\":\"folder\",\"draggable\":false,\"description\":\"Create data sources in this folder\"},";
	$tree .= "{\"text\":\"Datasets\",\"id\":\"datasets\",\"iconCls\":\"folder\",\"draggable\":false,\"description\":\"Create datasets in this folder\"},";	
	$tree .= "{\"text\":\"Executive Reports\",\"id\":\"execreports\",\"iconCls\":\"folder\",\"draggable\":false,\"description\":\"Reports for firm executives\"},";	
	$tree .= "{\"text\":\"Reports\",\"id\":\"reports\",\"iconCls\":\"folder\",\"draggable\":false,\"description\":\"Standard reports go in this folder\"}]";
	
	return $tree; 
}

function GetDataSources() {
    
	$datasrc = "[{\"text\":\"Time and Billing System\",\"id\":\"timeandbilling\",\"leaf\":true,\"iconCls\":\"datasource\",\"description\":\"Data from the time and billing system\"},";
	$datasrc .= "{\"text\":\"Employee Management System\",\"id\":\"emplmanagement\",\"leaf\":true,\"iconCls\":\"datasource\",\"description\":\"Data from the employee management system\"}]";	
	
	return $datasrc; 
}

function GetDatasets() {
    
	$datasets = "[{\"text\":\"Hours Worked\",\"id\":\"hrsworked\",\"leaf\":true,\"iconCls\":\"dataset\",\"description\":\"Hours worked by employee\"},";
	$datasets .= "{\"text\":\"Hours Billed\",\"id\":\"hrsbilled\",\"leaf\":true,\"iconCls\":\"dataset\",\"description\":\"Hours billed by employee\"},";	
	$datasets .= "{\"text\":\"Receipts\",\"id\":\"receipts\",\"leaf\":true,\"iconCls\":\"dataset\",\"description\":\"Daily receipts\"}]";
	
	return $datasets; 
}

function GetExecReports() {
    
	$reports = "[{\"text\":\"Profitability\",\"id\":\"profitability\",\"leaf\":true,\"iconCls\":\"report\",\"description\":\"Firm profitability by office\"},";
	$reports .= "{\"text\":\"Firm-Level Trends\",\"id\":\"trends\",\"leaf\":true,\"iconCls\":\"report\",\"description\":\"Trends by practice area\"}]";
	
	return $reports; 
}

function GetReports() {
    
	$reports = "[{\"text\":\"Work In Progress\",\"id\":\"workinprogress\",\"leaf\":true,\"iconCls\":\"report\",\"description\":\"Work in progress by employee\"},";
	$reports .= "{\"text\":\"Utilization\",\"id\":\"utilization\",\"leaf\":true,\"iconCls\":\"report\",\"description\":\"Utilization by employee\"}]";
	
	return $reports; 
}








?>