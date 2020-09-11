<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Surat Masuk Surat Keluar</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="lockscreen-content">
      <div>
        <h1>MONITORING SURAT MASUK DAN SURAT KELUAR</h1>
        <h2 class="text-center">PTPN VIII</h2>
      </div>

      <div class="lock-box">
        <h4 class="app-header__text">Halaman Login</h4>
        <form class="unlock-form" action="cek_login.php" method="post">
          <div class="form-group">
            <label class="control-label">Username</label>
            <input class="form-control" type="text" name="username" placeholder="Masukkan Username Anda" autofocus required="">
          </div>

          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" name="password" type="password" placeholder="Masukkan Password Anda" autofocus id="passwordjs">
            <input type="checkbox" onclick="myFunction()">Show Password</input>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="login" value="login" ><i></i>LOGIN </button>
            <br>
            
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->

    <script type="text/javascript" src="js/validation.js"></script>
    <script type="text/javascript" src="js/show.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
  </body>
</html>