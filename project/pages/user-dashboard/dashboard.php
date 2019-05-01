<?php

if (!isset($_SESSION["login_successful"])) {
  header('Location: ../user-login');
  exit();
}

echo <<<_END
<form action="dashboard.php" method="post" enctype='multipart/form-data'>

  <label for="content">Text File:</label>
  <input type="file" accept=".txt" name="content" required>

  <input type="submit" value="Submit">

</form>

<div id="content">
_END;

$timestamp = date('Y-m-d H:i:s');

if ($_FILES) {

  // Gets the file name and file content
  $user_filename = $_FILES['content']['name'];
  move_uploaded_file($_FILES['content']['tmp_name'], $user_filename);
  $user_filecontent = file_get_contents($user_filename);

  // Add the username and file to content table
  $user_data = "INSERT INTO content_table (user_username, user_filename, user_filecontent, time_created)
                VALUES ('$username', '$user_filename', '$user_filecontent', '$timestamp')";
  $conn->query($user_data);
}

// Show all the user files
$user_query = "SELECT user_filename, user_filecontent, time_created FROM $table_name WHERE user_email='$username'";
$result = $conn->query($user_query);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='content-block'>";
        echo "<h1>".$row["user_filename"]."</h1>";
        echo "<h2>".$row["time_created"]."</h2>";
        echo "<p>".$row["user_filecontent"]."</p>";
        echo "</div>";
    }
}

echo "</div>";

?>
