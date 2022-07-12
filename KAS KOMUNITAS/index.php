<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>
  <link rel="icon" href="img/pemkot.png" type="image/png" sizes="34x34">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/dist/css/adminlte.min.css">
</head>

</body>
<body class="hold-transition login-page dark-mode">
    
<?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan']== "gagal"){
            $error= true;
        }
        else if($_GET['pesan']=="logout"){
            $logout= true;
        }
    }
?>

<div class="login-box">
  <div class="login-logo">
    <img src="img/pemkot.png" style="width:270px;height:100px;"><br>
    <a href="index.php"><b>KAS Komunitas SDK</b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body ">
        <form action="cek_login.php" method="post">
            <?php if(isset($error)):?>
                <div class="alert alert-danger mt-2 mb-2" role="alert">
                    Username/Password Salah !!!
                </div>
            <?php endif ?>
            <?php if(isset($logout)):?>
                <div class="alert alert-primary mt-2 mb-2" role="alert">
                    Anda Berhasil Log out
                </div>
            <?php endif ?>
 
            <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" >
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block "  name="login_admin">Log In</button>
                </div>
            <!-- /.col -->
            </div>                
        </form>
    <!-- /.card -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/AdminLTE-3.1.0/dist/js/adminlte.min.js"></script>

</body>
</html>
