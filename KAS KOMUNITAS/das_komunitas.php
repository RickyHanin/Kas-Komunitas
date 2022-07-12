<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Komunitas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="ssets/AdminLTE-3.1.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<?php
 session_start();
 include 'koneksi.php';

  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }

  //ambil data komunitas
  $komunitas= "SELECT * FROM pengguna where level='komunitas'";
  $result= mysqli_query($koneksi,$komunitas);
  $hitung_komunitas= mysqli_num_rows($result);

  //ambil data pengeluaran
  $pengeluaran= "SELECT sum(nominal_pengeluaran) as jumlah_pengeluaran from pengeluaran";
  $result2= mysqli_query($koneksi,$pengeluaran);
  $jumlah_pengeluaran= mysqli_fetch_assoc($result2);

  //ambil data iuran
  $iuran= "SELECT sum(nominal_iuran) as jumlah_iuran from iuran";
  $result3= mysqli_query($koneksi,$iuran);
  $jumlah_iuran= mysqli_fetch_assoc($result3);
  
  //ambil data kas
  $kas= "SELECT sum(nominal) as jumlah_kas from kas";
  $result4= mysqli_query($koneksi,$kas);
  $jumlah_kas= mysqli_fetch_assoc($result4);
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
          <a href="logout.php" class="nav-link">Logout</a>
        </li>
      </li>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="das_komunitas.php" class="brand-link">
      <span class="brand-text font-weight-light">KAS Komunitas SDK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel  -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <button type="button" class="btn btn-block btn-success disabled"><?php echo $_SESSION['level']; ?></button>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- nav item laporan -->
          <li class="nav-item">
            <a href="laporan_komunitas/laporan_kas.php" class="nav-link ">
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <!-- Info boxes -->
      <div class="container-fluid">
        <div class="row">
          <!-- Info boxes pengeluaran -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pengeluaran</span>
                <span class="info-box-number">Rp.<?php echo $jumlah_pengeluaran['jumlah_pengeluaran'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- Info boxes saldo -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Saldo</span>
                <span class="info-box-number">Rp. <?php echo $jumlah_kas['jumlah_kas'] + $jumlah_iuran['jumlah_iuran']-$jumlah_pengeluaran['jumlah_pengeluaran'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- Info boxes komunitas -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Komunitas</span>
                <span class="info-box-number"><?=$hitung_komunitas ;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

      <!-- tabel data-->
      <div class="card" >
        <div class="card-body">
        <table id="example1" class="table table-bordered table-striped col-sm col-md ">
          <thead>
            <tr>
              <th scope="col" rowspan="2">No</th>
              <th scope="col" rowspan="2">Nama Kepala Keluarga</th>
              <th scope="col" colspan="12" class="text-center">Bulan </th>
            </tr>
            <tr>
              <th scope="col">1 </th>
              <th scope="col">2 </th>
              <th scope="col">3 </th>
              <th scope="col">4 </th>
              <th scope="col">5 </th>
              <th scope="col">6 </th>
              <th scope="col">7 </th>
              <th scope="col">8 </th>
              <th scope="col">9 </th>
              <th scope="col">10 </th>
              <th scope="col">11 </th>
              <th scope="col">12 </th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach($result as $data): ?>
            <tr>
              <td scope="row"><?= $no++ ?></td>
              <td><?= $data['nama']?></td>
              <?php
                //ambil data bulan
                $id = $data['id_pengguna'] ;
                $query= "SELECT * FROM kas where id_pengguna= $id";
                $result5= mysqli_query($koneksi,$query);
                $data_bulan = mysqli_fetch_all($result5);
                $bulan = [];
                for ($i=0; $i < count($data_bulan); $i++) { 
                  $bulan[] = $data_bulan[$i][2];
                }
                if (!$result5){
                  echo mysqli_error($koneksi);
                }
              ?>
              <td ><?php if (in_array("Januari", $bulan)):?><i class=" fas fa-check "> <?php endif ?></td>
              <td ><?php if (in_array("Februari", $bulan)):?><i class=" fas fa-check "> <?php endif ?></td>
              <td ><?php if (in_array("Maret", $bulan)):?><i class=" fas fa-check "> <?php endif ?></td>
              <td ><?php if (in_array("April", $bulan)):?><i class=" fas fa-check "> <?php endif ?></td>
              <td ><?php if (in_array("Mei", $bulan)):?><i class=" fas fa-check "> <?php endif ?></td>
              <td ><?php if (in_array("Juni", $bulan)):?><i class=" fas fa-check "> <?php endif ?></td>
              <td ><?php if (in_array("Juli", $bulan)):?><i class=" fas fa-check "> <?php endif ?></td>
              <td ><?php if (in_array("Agustus", $bulan)):?><i class=" fas fa-check "> <?php endif ?></td>
              <td ><?php if (in_array("September", $bulan)):?><i class=" fas fa-check "> <?php endif ?></td>
              <td ><?php if (in_array("Oktober", $bulan)):?><i class=" fas fa-check "> <?php endif ?></td>
              <td ><?php if (in_array("November", $bulan)):?><i class=" fas fa-check "> <?php endif ?></td>
              <td ><?php if (in_array("Desember", $bulan)):?><i class=" fas fa-check "> <?php endif ?></td> 
            </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr></tr>
          </tfoot>
        </table>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!--/Main Content-->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; </strong>
  </footer>


</div>
<!-- ./wrapper -->



<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="assets/AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/AdminLTE-3.1.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/AdminLTE-3.1.0/dist/js/adminlte.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="assets/AdminLTE-3.1.0/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/raphael/raphael.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="assets/AdminLTE-3.1.0/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/AdminLTE-3.1.0/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/AdminLTE-3.1.0/dist/js/pages/dashboard2.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/AdminLTE-3.1.0/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/jszip/jszip.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

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
