<?php

echo <<<_END
<main class="center">
  <div id="main-left">
    <div id="login-brand">
      <h1>Virisol</h1>
    </div>

    <!-- Form Start ================================== -->
    <div id="login-container">
      <h2>Create your account</h2>

_END;

        // Form message after submission
        require_once "../../components/message-signup.php";

echo <<<_END

        <form action="./" method="post" enctype='multipart/form-data'>

_END;

          // Email, username, and password inputs
          require_once "../../components/input-email.php";
          require_once "../../components/input-username.php";
          require_once "../../components/input-password.php";

echo <<<_END

          <div id="spaceBetween">
            <a class="btn center" href="../user-login">Log in instead</a>
            <button type="submit" class="btn-form">Signup</button>
          </div>

        </form>
    </div>

    <!-- Authors text -->
    <div id="login-credit">
      <a id="authors" href="../admin-login">Admins: Jasmine Mai, Nhat Nguyen, and Albert Ong</a>
    </div>

  </div>
  <div id="main-right"></div>
</main>
_END;

// Sanitize input functions
require_once "../../scripts/sanitize.php";

// Checks whether the varibles are set and not null
if (isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {

  // Sanitize the inputs with hashing and salting password
  $email = mysql_entities_fix_string($conn, $_POST["email"]);
  $username = mysql_entities_fix_string($conn, $_POST["username"]);
  $password = mysql_entities_fix_string($conn, $_POST["password"]);
  $salt1 = "JT5#SENTg4y";
  $salt2 = "mL3QytJD&FO";
  $token = hash("ripemd128", "$salt1$password$salt2");

  // Checking for email and username in the user table
  $email_query = $conn->query("SELECT * FROM $table_name WHERE user_email = '$email'");
  $email_exists = $email_query->num_rows == 1;
  $username_query = $conn->query("SELECT * FROM $table_name WHERE user_username = '$username'");
  $username_exists = $username_query->num_rows == 1;

  // If email or username does not exist, add to table
  if (!$email_exists && !$username_exists) {
    $table_query = "INSERT INTO $table_name (user_email, user_username, user_password)
                    VALUES ('$email', '$username', '$token')";
    $conn->query($table_query);

    // Set the successful message variable to true
    $_SESSION["account_creation_successful"] = true;

    // Go to login page
    header("Location: ../user-login");
    exit();
  } else {
    // Set the error message variable to true
    $_SESSION["account_creation_failed"] = true;

    // Refresh the current page
    header("Location: ./");
    exit();
  }
}

?>
