<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>eHijab| Login</title>

  <link href="../css/bootstrap.min.css" rel="stylesheet" />
  <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />

  <link href="../css/animate.css" rel="stylesheet" />
  <link href="../css/style.css" rel="stylesheet" />
</head>

<body class="gray-bg">
  <div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
      <div>
        <h2 class="text-dark">[NAMA APLIKASI MU]</h2>
      </div>
      <h3>Selamat Datang di [NAMA APLIKASI MU]</h3>
      <p>Silahkan Login</p>

      <form class="m-t" role="form" action="../action/login_controller.php?op=in" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Username" name="username" required="" />
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" name="password" required="" />
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

        <a href="#"><small>Forgot password?</small></a>
        <p class="text-muted text-center"><small>Do not have an account?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>

      </form>
      <a href="landing.php"><small>Back to main menu</small></a>
    </div>
  </div>

  <!-- Mainly scripts -->
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.js"></script>
</body>

</html>