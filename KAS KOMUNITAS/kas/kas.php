<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kas Komunitas SDK</title>

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


  //user
  $query= "SELECT * FROM pengguna where level = 'komunitas'";
  $result_1= mysqli_query($koneksi,$query);
    
  if (!$result_1){
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
      <span class="brand-text font-weight-light">KAS komunitas SDK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <button type="button" class=" btn btn-block btn-success disabled">Admin</button>
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
                  <p>Komunitas</p>
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
                <a href="kas.php" class="nav-link active">
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
            <h1 class="m-0">Kas Komunitas SDK</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../das_admin.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Kas Komunitas SDK</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --> 

    <!-- Main content -->
    <section class="content ">
            <!-- tabel data-->
            <div class="card" >
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped col-sm col-md ">
                <thead>
                <tr>
                  <th scope="col" rowspan="2">No</th>
                  <th scope="col" rowspan="2">Ketua Komunitas</th>
                  <th scope="col" colspan="12" class="text-center">Bulan </th>
                  <th scope="col" rowspan="2">AKSI</th>
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
                  <?php foreach($result_1 as $data): ?>
                  <tr>
                    <th scope="row"><?= $no++ ?></th>
                        <td><?= $data['nama']?></td>
                        <?php
                          // kas
                            $id = $data['id_pengguna'] ;
                            $query3= "SELECT * FROM kas where id_pengguna= $id";
                            $result3= mysqli_query($koneksi,$query3);
                            $data3 = mysqli_fetch_all($result3);
                            $bulan = [];
                            for ($i=0; $i < count($data3); $i++) { 
                              $bulan[] = $data3[$i][2];
                            }
                            
                            if (!$result3){
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
                      
                      <td>
                          
                        <a href="detail_kas.php?id=<?=$data["id_pengguna"]?>"type="button" class="btn btn-warning text-white">Detail</a>  
                      </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    
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
