<?php

echo <<<_END
<main class="center">
  <div id="main-left">
    <div id="login-brand">
      <h1>Online Virus Check</h1>
    </div>

    <!-- Form Start ================================== -->
    <div id="login-container">
      <h2>Login to your account</h2>

_END;

      // Form message after submission
      require_once "../../components/message-login.php";

echo <<<_END

      <form action="./" method="post" enctype="multipart/form-data">

_END;

        // Email and password inputs
        require_once "../../components/input-email.php";
        require_once "../../components/input-password.php";

echo <<<_END

        <!-- Create account and login buttons -->
        <div id="spaceBetween">
          <a class="btn center" href="../user-signup">Create account</a>
          <button type="submit" class="btn-form">Login</button>
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
if (isset($_POST["email"]) && isset($_POST["password"])) {

  // Sanitize the inputs with hashing and salting password
  $email = mysql_entities_fix_string($conn, $_POST["email"]);
  $password = mysql_entities_fix_string($conn, $_POST["password"]);
  $salt1 = "JT5#SENTg4y";
  $salt2 = "mL3QytJD&FO";
  $token = hash("ripemd128", "$salt1$password$salt2");

  $table_query = $conn->query("SELECT * FROM $table_name WHERE user_email='$email' AND user_password='$token'");
  $query_exists = $table_query->num_rows == 1;


  if ($query_exists) {
    // Set the login successful variable to true
    $_SESSION["login_successful"] = true;

    // Goes to dashboard
    header("Location: ../user-dashboard");
    exit();
  } else {
    // Set the login failed variable to true
    $_SESSION["login_failed"] = true;

    // Refresh the current page
    header("Location: ./");
    exit();
  }
}

?>
