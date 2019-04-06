
<!--
login.php

The login page for Online Virus check.

Online Virus Check
CS 174: Server-side Web Programming
Professor Fabio Di Troia

Written by Jasmine Mai, Nhat Nguyen, and Albert Ong
Revision 03.04.2019
-->

<main class="center">
  <div id="main-left">
    <div id="login-brand">
      <h1>Online Virus Check</h1>
    </div>

    <!-- Form Start ================================== -->
    <div id="login-container">
      <h2>Login to your account</h2>

      <form method="POST">

        <!-- Email and password inputs -->
        <?php require '../../components/input-email.php'; ?>
        <?php require '../../components/input-password.php'; ?>

        <!-- Create account and login buttons -->
        <div id="spaceBetween">
          <a class="center" id="signupLink" href="../signup/">Create account</a>
          <input type="submit" name="submit-login" value="Login">
        </div>
      </form>


      <?php
        // Retrieves the inputted email and password.
        $email_input = isset($_POST["email"]) ? $_POST["email"] : null;
        $password_input = isset($_POST["password"]) ? $_POST["password"] : null;

        // Loads the user database from MySQL.
        require '../../scripts/connection.php';
        $table_data = $conn -> query("SELECT email, password FROM users");

        $login_success = false;

        // Iterates through every row in the user database.
        while ($row = $table_data -> fetch_assoc()) {
          $email = $row["email"];
          $password = $row["password"];

          // If the email and password match a registered user, the login is successful.
          if ($email_input == $email && $password_input == $password) {
            $login_success = true;
            break;
          }
        }

        // Prints out a message if the login was successful or not.
        // if ($login_success) {
        //   echo "Login successful!";
        // }
        // else {
        //   echo "Login failed. ";
        // }
      ?>
    </div>

    <!-- Authors text -->
    <div id="login-credit">
      <p id="authors">Authors: Jasmine Mai, Nhat Nguyen, and Albert Ong</p>
    </div>

  </div>
  <div id="main-right"></div>
</main>