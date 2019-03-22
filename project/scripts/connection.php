<?php 

  // Information needed to connect to the MySQL database. 
  $server_name = "localhost"
  $database_username = "root";
  $database_password = "";
  $database_name = "projectDB";

  // Connects to the MySQL database. 
  $conn = new mysqli($server_name, $database_username, $database_password, $database_name);


  // Error message if unable to connect. 
  if ($conn -> connect_error) {
    die("Unable to connect");
  }
  
?>