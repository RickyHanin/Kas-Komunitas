<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Data Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/AdminLTE-3.1.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/AdminLTE-3.1.0/dist/css/adminlte.min.css">
</head>


<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<!-- tampil data-->
<?php
    include '../koneksi.php';
    $id= $_GET['id'];
    $query= "SELECT * FROM pengguna where id_pengguna=$id";
    $result= mysqli_query($koneksi,$query);
    $data = mysqli_fetch_assoc($result);
    
    if (!$result){
        echo mysqli_error($koneksi);
    }

?>


<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../logout.php" class="nav-link">Logout</a>
        </li>
      </li>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="../das_admin.php" class="brand-link">
      <span class="brand-text font-weight-light">KAS Komunitas SDK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <button type="button" class="btn btn-block btn-success disabled">Admin</button>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- nav item input data user -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Input Data Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="data_admin.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../komunitas/data_komunitas.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Komunitas</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- /nav item input data user -->
          

          <!-- nav item input data keuangan -->
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Input data Keuangan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../kas/kas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../iuran/iuran.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Iuran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pengeluaran/pengeluaran.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengeluaran</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- /nav item input data keuangan -->

          <!-- nav item laporan -->
          <li class="nav-item">
            <a href="../laporan/laporan_kas.php" class="nav-link ">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <!-- /nav item laporan -->

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    
  </aside>
  <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../das_admin.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="data_admin.php">Data Admin</a></li>
              <li class="breadcrumb-item active">Edit Data Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content ">
        <div class="card card-default">
            <div class="card-body">
                <form action="aksi_data_admin.php" method="post">
                    <div class="form-group row">
                        <label for="inputnama" class="col-sm-2 col-form-label mb-1">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputnama" name="nama" value="<?=$data['nama']?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputusername" class="col-sm-2 col-form-label mb-1">Username</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputusername" name="username" required="required" value="<?=$data['ussername']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputpassword" class="col-sm-2 col-form-label mb-1">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputpassword" name="password" required="required" value="<?=$data['password']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary mb-2 mt-4" name="edit-admin">Edit Data</button>
                    </div>
                            
                    </div>  
                </form>
            </div>
        </div>
    </section>
    <!--/Main Content-->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022</strong>
  </footer>


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../assets/AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/AdminLTE-3.1.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/AdminLTE-3.1.0/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../assets/AdminLTE-3.1.0/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/raphael/raphael.min.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../assets/AdminLTE-3.1.0/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../assets/AdminLTE-3.1.0/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/AdminLTE-3.1.0/dist/js/pages/dashboard2.js"></script>
</body>
</html>
