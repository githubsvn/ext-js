<?php
Include('../../../cfg/db.php');
$conn = OpenDbConnection();

$sql = "SELECT * FROM movies WHERE id = ".$_REQUEST['id'];

If (!$rs = mysql_query($sql)) {

	Echo '{success: false}';

}else{

    If (mysql_num_rows($rs) > 0) {
    	$obj = mysql_fetch_object($rs);
    	Echo '{success: true, data:'.json_encode($obj).'}';
    }else{
    	Echo '{success: false}';
    }

}
CloseDbConnection($conn);