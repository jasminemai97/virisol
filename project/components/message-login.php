<?php

// Displays account success message
if (isset($_SESSION["account_creation_successful"])) {
  echo "<div class='message' id='green'>Account successfully created!</div>";
  unset($_SESSION["account_creation_successful"]);
}

// Displays login success message
if (isset($_SESSION["login_successful"])) {
  echo "<div class='message' id='green'>Account successfully logged out!</div>";
  unset($_SESSION["login_successful"]);
}

// Displays login fail message
if (isset($_SESSION["login_failed"])) {
  echo "<div class='message' id='red'>Your email or password were incorrect!</div>";
  unset($_SESSION["login_failed"]);
}

?>
