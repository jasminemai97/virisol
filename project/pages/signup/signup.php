<main>
  <div id="main-left">
    <div id="login-brand">
      <p id="title">CS174 • Onlive Virus Checker</p>
    </div>

    <!-- Form Start ================================== -->
    <div id="login-container">
      <h2>Create your account</h2>

        <form action="../login/base.php" method="POST">

          <?php require '../../components/input-name.php'; ?>
          <?php require '../../components/input-email.php'; ?>
          <?php require '../../components/input-password.php'; ?>

          <div id="spaceBetween">
            <a id="signupLink" href="../login/">Log in instead</a>
            <input type="submit" name="submit-signup" value="Signup">
          </div>

        </form>
        
    </div>

    <div id="login-credit">
      <p style="font-size:14px;">Nhat Nguyen • Jasmine Mai • Albert Ong</p>
    </div>
  </div>
  <div id="main-right"></div>
</main>