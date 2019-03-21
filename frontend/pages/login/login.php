<body>

<main>
  <div id="main-left">
    <div id="login-brand">
      <p id="title">CS174 • Onlive Virus Checker</p>
    </div>

    <!-- Form Start ================================== -->
    <div id="login-container">
      <h2>Welcome back, please login to your account</h2>
      
      <form>

        <?php include '../../components/input-email.php'; ?>
        <?php include '../../components/input-password.php'; ?>

        <div id="spaceBetween">
          <a id="signupLink" href="http://localhost/cs174/online-virus-check/frontend/pages/signup/base.php">Create account</a>
          <input type="submit" value="Login">
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