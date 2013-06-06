<?php
function OpenDbConnection() {

  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $dbname = 'extjs2';
  $conn = mysql_connect('localhost', 'root', '');
  $selected = mysql_select_db("extjs2", $conn);
  if (!$selected) {
      var_dump(mysql_error());
  }
  return $conn;
}

function CloseDbConnection($conn) {
  mysql_close($conn);
}

OpenDbConnection();