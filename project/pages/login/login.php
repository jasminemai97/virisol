<main class="center">
  <div id="main-left">
    <div id="login-brand">
      <p id="title">CS174 • Onlive Virus Checker</p>
    </div>

    <!-- Form Start ================================== -->
    <div id="login-container">
      <h2>Login to your account</h2>
      
      <form method="POST">

        <?php require '../../components/input-email.php'; ?>
        <?php require '../../components/input-password.php'; ?>

        <div id="spaceBetween">
          <a class="center" id="signupLink" href="../signup/">Create account</a>
          <input type="submit" name="submit-login" value="Login">
        </div>

      </form>
    </div>
    
    <div id="login-credit">
      <p style="font-size:14px;">Nhat Nguyen • Jasmine Mai • Albert Ong</p>
    </div>
  </div>
  <div id="main-right"></div>
</main>