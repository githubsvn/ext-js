<?php
function OpenDbConnection() {


  $dbhost = 'localhost:3306';
  $dbuser = 'root';
  $dbpass = 'admin';
  $dbname = 'extjs2';



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