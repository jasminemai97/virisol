<?php

// Displays error message
if (isset($_SESSION["account_creation_failed"])) {
  echo "<div class='message' id='red'>Email or username already exist!</div>";
  unset($_SESSION["account_creation_failed"]);
}

?>
