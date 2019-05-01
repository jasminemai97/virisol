<?php

// Information needed to connect to the MySQL database
require_once "connection.php";

// Connects to database and create if it does not exist
require_once "database.php";

// Declare table name
$table_name = "user_contents";

// Checks if credentials table exists.
$table_query = $conn -> query("SHOW TABLES LIKE '$table_name'");
$table_exist = $table_query -> num_rows == 1;

// If the credentials table does not exist, create the table
if (!$table_exist) {

  // Declare MySQL table columns with data types
  $table = "CREATE TABLE $table_name (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_email VARCHAR(128) NOT NULL,
    user_filename VARCHAR(128) NOT NULL,
    user_filecontent TEXT(65535) NOT NULL,
    time_created TIMESTAMP NOT NULL
  ) ENGINE MyISAM";

  $conn -> query($table);
}

?>
