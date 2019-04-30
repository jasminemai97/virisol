<?php

if (!isset($_SESSION["login_successful"])) {
  header('Location: ../user-login');
  exit();
}

echo <<<_END
<h1>Dashboard Page</h1>

<form action="dashboard.php" method="post" enctype='multipart/form-data'>

  <label for="content">Text File:</label>
  <input type="file" class="center" accept=".txt" name="content" required>

  <input type="submit" value="Submit">

</form>

<div id="content">
_END;

?>
