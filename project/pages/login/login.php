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

      <form action="index.php" method="post" enctype='multipart/form-data'>

_END;

        // Email and password inputs
        require '../../components/input-email.php';
        require '../../components/input-password.php';

echo <<<_END

        <!-- Create account and login buttons -->
        <div id="spaceBetween">
          <a class="center" id="signupLink" href="../signup">Create account</a>
          <input type="submit" name="submit-login" value="Login">
        </div>
      </form>
    </div>

    <!-- Authors text -->
    <div id="login-credit">
      <p id="authors">Authors: Jasmine Mai, Nhat Nguyen, and Albert Ong</p>
    </div>

  </div>
  <div id="main-right"></div>
</main>
_END;

// Sanitize tnput functions
require_once '../../scripts/sanitize.php';

// Checks whether the varibles are set and not null
if (isset($_POST['email']) && isset($_POST['password'])) {

  // Sanitize the inputs
  $email = mysql_entities_fix_string($conn, $_POST['email']);
  $password = mysql_entities_fix_string($conn, $_POST['password']);
  $salt1 = "JT5#SENTg4y";
  $salt2 = "mL3QytJD&FO";
  $token = hash('ripemd128', "$salt1$password$salt2");

  $query = $conn->query("SELECT * FROM credentials WHERE user_email='$email' AND user_password='$token'");
  $query_exists = $query->num_rows == 1;


  if ($query_exists) {
    echo "<div class='message' id='green'>Login Successful</div>";
    // $_SESSION["username"] = $username;
    // $_SESSION["isLogin"] = true;
    // header('Location: ./dashboard.php');
    // exit();
  } else {
    echo "<div class='message' id='red'>Login Failed</div>";
  }
}

?>