<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iuran Komunitas SDK</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/AdminLTE-3.1.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/AdminLTE-3.1.0/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/AdminLTE-3.1.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/AdminLTE-3.1.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/AdminLTE-3.1.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<?php
  include '../koneksi.php';
  //ambil data iuran
  $iuran= "SELECT sum(nominal_iuran) as jumlah from iuran";
  $result= mysqli_query($koneksi,$iuran);
  $total= mysqli_fetch_assoc($result);//menghitung jumlah pengeluaran
  
?>
<!--tampil data-->
<?php
  include '../koneksi.php';

  $query= "SELECT * FROM iuran";
  $result= mysqli_query($koneksi,$query);
    
  if (!$result){
    echo mysqli_error($koneksi);
  }

?>

<!--pesan-->
<?php
  if(isset($_GET['pesan_hapus'])){
    if($_GET['pesan_hapus']== "berhasil"){
      $berhasil_hapus= true;
    }
    else if($_GET['pesan_hapus']=="gagal"){
      $gagal_hapus= true;
    }
  }
?>
<?php
  if(isset($_GET['pesan_tambah'])){
    if($_GET['pesan_tambah']== "berhasil"){
      $berhasil_tambah= true;
    }
    else if($_GET['pesan_tambah']=="gagal"){
      $gagal_tambah= true;
    }
  }
?>
<?php
  if(isset($_GET['pesan_edit'])){
    if($_GET['pesan_edit']== "berhasil"){
      $berhasil_edit= true;
    }
    else if($_GET['pesan_edit']=="gagal"){
      $gagal_edit= true;
    }
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
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Input Data Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../admin/data_admin.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../komunitas/data_komunitas.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>komunitas</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- /nav item input data user -->
          

          <!-- nav item input data keuangan -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
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
                <a href="iuran.php" class="nav-link active">
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
            <h1 class="m-0">Iuran Komunitas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../das_admin.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Iuran Komunitas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content ">

      <!--pemberitahuan-->
      <div class="row">
          <div class="col-8">
            <?php if(isset($gagal_hapus)):?>
                <div class="btn btn-danger text-white mt-4 " role="alert">
                    Data gagal dihapus
                </div>
            <?php endif ?>
            <?php if(isset($berhasil_hapus)):?>
                <div class="btn btn-success text-white mt-4 " role="alert">
                    Data berhasil dihapus
                </div>
            <?php endif ?>    
            <?php if(isset($gagal_tambah)):?>
                <div class="btn btn-danger text-white mt-4 " role="alert">
                    Data gagal ditambah
                </div>
            <?php endif ?>
            <?php if(isset($berhasil_tambah)):?>
                <div class="btn btn-success text-white mt-4 " role="alert">
                    Data berhasil ditambah
                </div>
            <?php endif ?> 
            <?php if(isset($gagal_edit)):?>
                <div class="btn btn-danger text-white mt-4 " role="alert">
                    Data gagal diedit
                </div>
            <?php endif ?>
            <?php if(isset($berhasil_edit)):?>
                <div class="btn btn-success text-white mt-4 " role="alert">
                    Data berhasil diedit
                </div>
            <?php endif ?>    
          </div>
          <div class="col-4">
            <p class="text-right mt-4 "><a href="tambah_iuran.php" class="btn btn-info text-white ">Tambah Iuran </a></p>
          </div>  
      </div> 

            <!-- tabel data-->
            <div class="card " >
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kegiatan</th>
                  <th scope="col">Keterangan </th>
                  <th scope="col">Tanggal </th>
                  <th scope="col">Bulan </th>
                  <th scope="col">AKSI</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach($result as $data): ?>
                  <tr>
                    <th scope="row"><?= $no++ ?></th>
                      <td><?= $data['nama_iuran']?></td>
                      <td><?= $data['keterangan_iuran']?></td>
                      <td><?= $data['tgl_iuran']?></td>
                      <td><?= $data['nominal_iuran']?></td>
                      <td>
                        <a href="edit_iuran.php?id=<?=$data["id_iuran"]?>"type="button" class="btn btn-warning">Edit</a>  
                        <a href="aksi_iuran.php?del&id=<?=$data["id_iuran"]?>"type="button" class="btn btn-danger">Delete</a> 
                      </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th class=" text-left"colspan="4">Total: </th>
                    <th class="text-left" colspan="2">Rp.<?php echo $total['jumlah'];?></th>
                  </tr>
                </tfoot>
              </table>
              </div>
              </div>
              <!-- /.card -->
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

<!-- DataTables  & Plugins -->
<script src="../assets/AdminLTE-3.1.0/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/jszip/jszip.min.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
