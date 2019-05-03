<?php

if (!isset($_SESSION["login_successful"])) {
  header("Location: ../user-login");
  exit();
}

echo <<<_END
<h1>User Dashboard</h1>
<form action="./" method="post" enctype='multipart/form-data'>

  <label for="content">Upload file</label>
  <input type="file" accept=".txt" name="content" required>

  <input type="submit" value="Submit">

</form>

<a class="btn center" href="../user-login">Logout</a>

<div id="content">
_END;

$user_email = $_SESSION["user_email"];
$user_timestamp = date("Y-m-d H:i:s");

if ($_FILES) {

  // Gets the file name and file content
  $user_filename = $_FILES["content"]["name"];
  move_uploaded_file($_FILES["content"]["tmp_name"], $user_filename);
  $user_filecontent = file_get_contents($user_filename);

  // Converts the file contents into a string of hexadecimal.
  $user_filebytes = implode(unpack("H*", $user_filecontent));

  // Add the username and file to content table
  $user_data = "INSERT INTO $table_name (user_email, user_filename, user_filecontent, user_filebyte, time_created)
                VALUES ('$user_email', '$user_filename', '$user_filecontent', '$user_filebytes', '$user_timestamp')";
  $conn->query($user_data);

  // Refresh the current page
  header("Location: ./");
  exit();
}

// Show all the user files
$user_query = "SELECT user_filename, user_filecontent, user_filebyte, time_created FROM $table_name WHERE user_email='$user_email'";
$result = $conn->query($user_query);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {

    $filebytes = $row["user_filebyte"];
    $table_query = $conn->query("SELECT * FROM admin_contents WHERE admin_filebyte='$filebytes'");
    $query_exists = $table_query->num_rows == 1;

    if ($query_exists) {
      echo "<div class='content-block virus'>
        <h1>VIRUS $row[user_filename]</h1>
        <h2>$row[time_created]</h2>
        <p><b>Content:</b> $row[user_filecontent]</p>
        <p><b>Hex:</b> $row[user_filebyte]</p>
      </div>";
    } else {
      echo "<div class='content-block'>
        <h1>$row[user_filename]</h1>
        <h2>$row[time_created]</h2>
        <p><b>Content:</b> $row[user_filecontent]</p>
        <p><b>Hex:</b> $row[user_filebyte]</p>
      </div>";
    }
  }
}

echo "</div>";

?>
