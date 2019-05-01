<?php

// Connects to the MySQL database. Error message if unable to connect.
$conn = new mysqli($hostname, $username, $password);
if ($conn->connect_error) die($conn->connect_error);

// Create database if it does not exist and then go into the database
$conn->query("CREATE DATABASE IF NOT EXISTS project");
$conn->query("USE project");

?>
