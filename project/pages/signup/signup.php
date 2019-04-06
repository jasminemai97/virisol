
<!--
signup.php

The signup page for Online Virus Check.

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
      <h2>Create your account</h2>

        <form action="../login/" method="POST">

          <?php require '../../components/input-username.php'; ?>
          <?php require '../../components/input-email.php'; ?>
          <?php require '../../components/input-password.php'; ?>

          <div id="spaceBetween">
            <a class="center" id="signupLink" href="../login/">Log in instead</a>
            <input type="submit" name="submit-signup" value="Signup">
          </div>

        </form>
    </div>

      <?php
        // Retrieves the inputted name, email, and password.
        $name_input = isset($_POST["username"]) ? $_POST["username"] : null;
        $email_input = isset($_POST["email"]) ? $_POST["email"] : null;
        $password_input = isset($_POST["password"]) ? $_POST["password"] : null;

        // Loads the user database from MySQL.
//        require '../../scripts/connection.php';
//        $table_data = $conn -> query("SELECT email FROM users");
//
        // Iterates through every row in the user database.
//        while ($row = $table_data -> fetch_assoc()) {
//          $email = $row["email"];
//
//          if ($email_input == $email) {
//            break;
//          }
//        }
      ?>

    <!-- Authors text -->
    <div id="login-credit">
      <p id="authors">Authors: Jasmine Mai, Nhat Nguyen, and Albert Ong</p>
    </div>

  </div>
  <div id="main-right"></div>
</main>