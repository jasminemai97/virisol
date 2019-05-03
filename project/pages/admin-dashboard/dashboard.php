<?php

if (!isset($_SESSION["login_successful"])) {
  header("Location: ../admin-login");
  exit();
}

echo <<<_END
<h1>Admin Dashboard</h1>
<form action="./" method="post" enctype='multipart/form-data'>

  <label for="content">Upload file</label>
  <input type="file" accept=".txt" name="content" required>

  <input type="submit" value="Submit">

</form>

<a class="btn center" href="../admin-login">Logout</a>

<div id="content">
_END;

$user_email = $_SESSION["admin_email"];
$user_timestamp = date("Y-m-d H:i:s");

if ($_FILES) {

  // Gets the file name and file content
  $user_filename = $_FILES["content"]["name"];
  move_uploaded_file($_FILES["content"]["tmp_name"], $user_filename);
  $user_filecontent = file_get_contents($user_filename);

  // Converts the file contents into a string of hexadecimal.
  $user_filebytes = implode(unpack("H*", $user_filecontent));

  // Add the username and file to content table
  $user_data = "INSERT INTO $table_name (admin_email, admin_filename, admin_filecontent, admin_filebyte, time_created)
                VALUES ('$user_email', '$user_filename', '$user_filecontent', '$user_filebytes', '$user_timestamp')";
  $conn->query($user_data);

  // Refresh the current page
  header("Location: ./");
  exit();
}

// Show all the user files
$user_query = "SELECT admin_filename, admin_filecontent, admin_filebyte, time_created FROM $table_name WHERE admin_email='$user_email'";
$result = $conn->query($user_query);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {

echo <<< _END
      <div class='content-block'>
        <h1>$row[admin_filename]</h1>
        <h2>$row[time_created]</h2>
        <p><b>Content:</b> $row[admin_filecontent]</p>
        <p><b>Hex:</b> $row[admin_filebyte]</p>
      </div>
_END;
  }
}

echo "</div>";
?>
