<?php
function OpenDbConnection() {


  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = 'admin';
  $dbname = 'sakila';



  $conn = mysql_connect($dbhost, $dbuser, $dbpass);

  if (!$conn) {
    echo( "Unable to connect to the database server." );
    exit();
  }

  mysql_select_db($dbname) or die( "Error selecting database.");

  return $conn;
}

function CloseDbConnection($conn) {
  mysql_close($conn);
}
?>