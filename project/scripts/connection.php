<?php

  // Information needed to connect to the MySQL database.
  $hostname = "localhost";
	$username = "username";
	$password = "password";
	$database = "projectDB";


  // Connects to the MySQL database. Error message if unable to connect.
  $conn = new mysqli($hostname, $username, $password, $database);
	if ($conn->connect_error) die($conn->connect_error);

?>