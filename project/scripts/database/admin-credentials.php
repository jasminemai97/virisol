<?php

// Information needed to connect to the MySQL database
require_once "connection.php";

// Connects to database and create if it does not exist
require_once "database.php";

// Declare table name
$table_name = "admin_credentials";

// Checks if credentials table exists.
$table_query = $conn -> query("SHOW TABLES LIKE '$table_name'");
$table_exist = $table_query -> num_rows == 1;

// If the credentials table does not exist, create the table
if (!$table_exist) {

  // Declare MySQL table columns with data types
  $table = "CREATE TABLE $table_name (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    admin_email VARCHAR(128) NOT NULL UNIQUE,
    admin_username VARCHAR(128) NOT NULL UNIQUE,
    admin_password VARCHAR(128) NOT NULL
  ) ENGINE MyISAM";
  $conn -> query($table);

  // Holds all of the admin information
  $admin_data = array(
    array("admin_email"=>"jasminemai@admin.com", "admin_username"=>"adminJasmine", "admin_password"=>"watermelon42"),
    array("admin_email"=>"nhatnguyen@admin.com", "admin_username"=>"adminNhat", "admin_password"=>"pineapple19"),
    array("admin_email"=>"albertong@admin.com", "admin_username"=>"adminAlbert", "admin_password"=>"grapefruit70"),
  );
  
  // Insert admin information to the table
  foreach ($admin_data as $info) {
  
    // Salting and hashing the password. 
    $salt1 = "JT5#SENTg4y";
    $salt2 = "mL3QytJD&FO";
    $token = hash("ripemd128", "$salt1$info[admin_password]$salt2");

    $conn->query("INSERT INTO $table_name 
                     (admin_email, admin_username, admin_password) 
                  VALUES 
                   ('$info[admin_email]', '$info[admin_username]', '$token')");
  }
}
?>
