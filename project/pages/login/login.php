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

      <form method="POST">

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
?>