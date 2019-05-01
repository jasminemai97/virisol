<?php

// Displays account success message
if (isset($_SESSION["account_creation_successful"])) {
  echo "<div class='message' id='green'>Account successful created!</div>";
  unset($_SESSION["account_creation_successful"]);
}

// Displays login fail message
if (isset($_SESSION["login_failed"])) {
  echo "<div class='message' id='red'>Your email or password were incorrect!</div>";
  unset($_SESSION["login_failed"]);
}

// // Displays login success message
// if (isset($_SESSION["login_successful"])) {
//   echo "<div class='message' id='green'>You are successful logged in!</div>";
//   unset($_SESSION["login_successful"]);
// }

?>
