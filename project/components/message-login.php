<?php

// Displays account success message
if (isset($_SESSION["account_creation_successful"])) {
  echo "<div class='message' id='green'>Account successfully created!</div>";
}

// Displays login success message
if (isset($_SESSION["login_successful"])) {
  echo "<div class='message' id='green'>Account successfully logged out!</div>";
}

// Displays login fail message
if (isset($_SESSION["login_failed"]) || isset($_SESSION["admin_login_failed"])) {
  echo "<div class='message' id='red'>Your email or password were incorrect!</div>";
}

// Free all session variables
session_unset();

?>
