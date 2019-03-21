<body>

  <main>
    <div id="main-left">
      <div id="login-brand">
        <p id="title">CS174 • Onlive Virus Checker</p>
      </div>

      <!-- Form Start ================================== -->
      <div id="login-container">
        <h2>Create your account</h2>

          <form>

            <?php include '../../components/input-name.php'; ?>
            <?php include '../../components/input-email.php'; ?>
            <?php include '../../components/input-password.php'; ?>

            <div id="spaceBetween">
              <a id="signupLink" href="http://localhost/cs174/online-virus-check/frontend/pages/login/base.php">Log in instead</a>
              <input type="submit" value="Signup">
            </div>

          </form>
          
      </div>

      <div id="login-credit">
        <p>Nhat Nguyen • Jasmine Mai • Albert Ong</p>
      </div>
    </div>
    <div id="main-right"></div>
  </main>

</body>