<?php

// Information needed to connect to the MySQL database.
require_once 'connection.php';

// Connects to the MySQL database. Error message if unable to connect.
$conn = new mysqli($hostname, $username, $password);
if ($conn->connect_error) die($conn->connect_error);

// Create database if it does not exist and then go into the database
$conn->query("CREATE DATABASE IF NOT EXISTS project");
$conn->query("USE project");

// Checks if credentials table exists.
$tables = $conn->query("SHOW TABLES LIKE 'credentials'");
$table_exists = $tables -> num_rows == 1;

// If the credentials table does not exist, create the table
if (!$table_exists) {

  // Initializes the table of users.
  $credentials = "CREATE TABLE credentials (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_email VARCHAR(128) NOT NULL UNIQUE,
    user_username VARCHAR(128) NOT NULL UNIQUE,
    user_password VARCHAR(128) NOT NULL
  ) ENGINE MyISAM";

  $conn->query($credentials);
}

?>
