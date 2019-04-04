
<!--
connection.php

Connects the program to MySQL. 

Online Virus Check
CS 174: Server-side Web Programming
Professor Fabio Di Troia

Written by Jasmine Mai, Nhat Nguyen, and Albert Ong
Revision 03.04.2019
-->

<?php

  // Information needed to connect to the MySQL database.
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "online_virus_check_database";

  // Connects to the MySQL database. Error message if unable to connect.
  $conn = new mysqli($hostname, $username, $password, $database);

  if ($conn->connect_error) {
    die($conn->connect_error);
  }

  // echo "Connected to MySQL successfully! <br>";

  // Checks if a table named 'users' exists. 
  $tables = $conn -> query("SHOW TABLES LIKE 'users'");
  $table_exists = $tables -> num_rows == 1; 

  // If the table 'users' does not exist... 
  if (!$table_exists) {
    echo "The table does not exist. ";
    
    // Initializes the table of users. 
    $users_table = "CREATE TABLE users (
      username VARCHAR(128), 
      email VARCHAR(128), 
      password VARCHAR(128), 
      permission VARCHAR(32) 
    )";

    // Adds the three authors as admins. 
    $user_data = "INSERT INTO users
                    (username, email, password, permission)
                  VALUES 
                    ('Jasmine Mai', 'jasmine.mai@gmail.com', 'jasminemai', 'admin'), 
                    ('Nhat Nguyen', 'nhat.nguyen@gmail.com', 'nhatnguyen', 'admin'), 
                    ('Albert Ong', 'albert.ong@gmail.com', 'albertong', 'admin') ";

    $conn -> query($users_table);
    $conn -> query($user_data);
  }
?>