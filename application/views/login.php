<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Halaman Login</title>
    <base href="<?php echo base_url() ?>">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
  <link rel="stylesheet" type="text/css" href="assets/login/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/login/css/my-login.css">
  </head>
  <body class="my-login-page">
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-md-center h-100">
        <div class="card-wrapper">
          <div class="brand">
            <img src="assets/login/img/logo.jpg">
          </div>
          <div class="card fat">
            <div class="card-body">
              <h4 class="card-title">Login</h4>
              <form method="POST">
               
                <div class="form-group">
                  <label for="email">Username</label>

                  <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                </div>

                <div class="form-group">
                  <label for="password">Password
                    <a href="forgot.html" class="float-right">
                      Forgot Password?
                    </a>
                  </label>
                  <input id="password" type="password" class="form-control" name="password" required data-eye>
                </div>

                <div class="form-group">
                  <label>
                    <input type="checkbox" name="remember"> Remember Me
                  </label>
                </div>

                <div class="form-group no-margin">
                  <button type="submit" class="btn btn-primary btn-block">
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="footer">
            Copyright &copy; Nikitoko.com 2019
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="assets/login/js/jquery.min.js"></script>
  <script src="assets/login/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/login/js/my-login.js"></script>
</body>
</html>
