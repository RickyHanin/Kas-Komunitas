<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Kas</title>
  <link rel="icon" href="img/pemkot.png" type="image/png" sizes="34x34">

  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
    }
  </style>
</head>
<body>
  <?php
    include '../koneksi.php';
    
    
    if(isset($_GET['print'])){
      $bulan = $_GET['bulan'];
      
      if ($bulan=='Januari') {
        $bul = 1;
        $bulan_sebelumnya='Desember';
        $bul_seb=0;
      }elseif ($bulan=='Februari') {
        $bul = 2;
        $bulan_sebelumnya='Januari';
        $bul_seb=1;
      }elseif ($bulan=='Maret') {
        $bul = 3;
        $bulan_sebelumnya='Februari';
        $bul_seb=2;
      }elseif ($bulan=='April') {
        $bul = 4;
        $bulan_sebelumnya='Maret';
        $bul_seb=3;
      }elseif ($bulan=='Mei') {
        $bul = 5;
        $bulan_sebelumnya='April';
        $bul_seb=4;
      }elseif ($bulan=='Juni') {
        $bul = 6;
        $bulan_sebelumnya='Mei';
        $bul_seb=5;
      }elseif ($bulan=='Juli') {
        $bul = 7;
        $bulan_sebelumnya='Juni';
        $bul_seb=6;
      }elseif ($bulan=='Agustus') {
        $bul = 8;
        $bulan_sebelumnya='Juli';
        $bul_seb=7;
      }elseif ($bulan=='September') {
        $bul = 9;
        $bulan_sebelumnya='Agustus';
        $bul_seb=8;
      }elseif ($bulan=='Oktober') {
        $bul = 10;
        $bulan_sebelumnya='September';
        $bul_seb=9;
      }elseif ($bulan=='November') {
        $bul = 11;
        $bulan_sebelumnya='Oktober';
        $bul_seb=10;
      }elseif ($bulan=='Desember') {
        $bul = 12;
        $bulan_sebelumnya='November';
        $bul_seb=11;
      }

      $iuran= "SELECT SUM(nominal_iuran) as total_iuran FROM iuran WHERE MONTH(tgl_iuran) = '$bul'";
      $result= mysqli_query($koneksi,$iuran);
      $total_iuran= mysqli_fetch_assoc($result);
      
      $iuran_sebelumnya= "SELECT SUM(nominal_iuran) as total_iuran_sebelumnya FROM iuran WHERE MONTH(tgl_iuran) = '$bul_seb'";
      $result2= mysqli_query($koneksi,$iuran_sebelumnya);
      $total_iuran_sebelumnya= mysqli_fetch_assoc($result2);
      
      $pengeluaran= "SELECT SUM(nominal_pengeluaran) as total_pengeluaran FROM pengeluaran WHERE MONTH(tgl_pengeluaran) = '$bul'";
      $result3= mysqli_query($koneksi,$pengeluaran);
      $total_pengeluaran= mysqli_fetch_assoc($result3);
      
      $pengeluaran_sebelumnya= "SELECT SUM(nominal_pengeluaran) as total_pengeluaran_sebelumnya FROM pengeluaran WHERE MONTH(tgl_pengeluaran) = '$bul_seb'";
      $result4= mysqli_query($koneksi,$pengeluaran_sebelumnya);
      $total_pengeluaran_sebelumnya= mysqli_fetch_assoc($result4);

      $kas= "SELECT SUM(nominal) as total_kas FROM kas WHERE bulan = '$bulan'";
      $result5= mysqli_query($koneksi,$kas);
      $total_kas= mysqli_fetch_assoc($result5);
      
      $kas_sebelumnya= "SELECT SUM(nominal) as total_kas_sebelumnya FROM kas WHERE MONTH(tgl_bayar) = '$bul_seb'";
      $result6= mysqli_query($koneksi,$kas_sebelumnya);
      $total_kas_sebelumnya= mysqli_fetch_assoc($result6);
      

      $saldo_sebelumnya= $total_kas_sebelumnya['total_kas_sebelumnya'] + $total_iuran_sebelumnya['total_iuran_sebelumnya']-$total_pengeluaran_sebelumnya['total_pengeluaran_sebelumnya'];
      $saldo_2= $saldo_sebelumnya+ $total_kas['total_kas'] ;
      $saldo_3= $saldo_2+ $total_iuran['total_iuran'] ;
      $saldo_4= $saldo_3- $total_pengeluaran['total_pengeluaran'] ;

      $komunitas= "SELECT * FROM kas WHERE bulan = '$bulan'";
      $result7= mysqli_query($koneksi,$komunitas);

      $iuran= "SELECT * FROM iuran WHERE MONTH(tgl_iuran) = '$bul'";
      $result9= mysqli_query($koneksi,$iuran);

      $pengeluaran= "SELECT * FROM pengeluaran WHERE MONTH(tgl_pengeluaran) = '$bul'";
      $result10= mysqli_query($koneksi,$pengeluaran);
     
    }
      

  ?>
  <h1>Laporan Kas Komunitas SDK</h1>
  <h3>Bulan : <?php echo $bulan; ?></h3>

  <table style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Keterangan Transaksi</th>
          <th>Masuk</th>
          <th>Keluar</th>
          <th>Saldo</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td >Saldo Bulan <?php echo $bulan_sebelumnya; ?></td>
          <td>-</td>
          <td>-</td>
          <td >Rp. <?php echo   $saldo_sebelumnya ;?></td>
          
        </tr>
        <tr>
          <td>2</td>
          <td>Total Kas Bulan <?php echo $bulan; ?> </td>
          <td>Rp. <?php echo $total_kas['total_kas'];?></td>
          <td>-</td>
          <td>Rp. <?php echo  $saldo_2 ;?></td>
        </tr>
        <tr>
          <td>3</td>
          <td>Total Iuran Bulan <?php echo $bulan; ?></td>
          <td>Rp. <?php echo $total_iuran['total_iuran'];?></td>
          <td>-</td>
          <td>Rp. <?php echo  $saldo_3;?></td>
        </tr>
        <tr>
          <td>4</td>
          <td>Total Pengeluaran Bulan<?php echo $bulan; ?> </td>
          <td>-</td>
          <td>Rp. <?php echo $total_pengeluaran['total_pengeluaran'];?></td>
          <td>Rp. <?php echo  $saldo_4 ;?></td>
        </tr>
      </tbody>
      <tfoot>
          <tr>
              <td colspan="4" >Saldo Akhir Bulan <?php echo $bulan; ?></td>
              <td colspan="1">Rp. <?php echo  $saldo_4 ;?></td>
          </tr>
      </tfoot>
  </table>
  <br>
  <h3>Detail Transaksi :</h3>
  <p>Kas bulan <?php echo $bulan; ?>:</p>
  <table style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Ketua Komunitas</th>
        <th>Tanggal Bayar</th>
        <th>Nominal</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php $no = 1; ?>
        <?php foreach($result7 as $data): ?>
        <?php
          $id = $data['id_pengguna'] ;
          $nama_komunitas= "SELECT kas.tgl_bayar, kas.nominal, pengguna.nama FROM pengguna INNER JOIN kas ON pengguna.id_pengguna = kas.id_pengguna WHERE pengguna.id_pengguna = $id AND kas.bulan = '{$bulan}'";
          $result8= mysqli_query($koneksi,$nama_komunitas);
         
        ?>
        <?php foreach($result8 as $row): ?>
        <td><?= $no++ ?></td>
        <td><?php echo $row['nama'] ?></td>
        <td><?php echo $row['tgl_bayar'] ?></td>
        <td>Rp. <?php echo $row['nominal'] ?></td>
        <?php endforeach ?>
      </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">Total Kas Bulan <?php echo $bulan; ?></td>
        <td colspan="1">Rp. <?php echo $total_kas['total_kas'];?></td>
      </tr>
    </tfoot>
  </table>
  <p>Iuran bulan <?php echo $bulan; ?>:</p>
  <table style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Kegiatan</th>
        <th>Keterangan</th>
        <th>Tanggal </th>
        <th>Nominal</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php $no = 1; ?>
        <?php foreach($result9 as $data_iuran): ?>
        <td><?= $no++ ?></td>
        <td><?php echo $data_iuran['nama_iuran'] ?></td>
        <td><?php echo $data_iuran['keterangan_iuran'] ?></td>
        <td><?php echo $data_iuran['tgl_iuran'] ?></td>
        <td>Rp. <?php echo $data_iuran['nominal_iuran'] ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4">Total Iuran Bulan <?php echo $bulan; ?></td>
        <td colspan="1">Rp. <?php echo $total_iuran['total_iuran'];?></td>
      </tr>
    </tfoot>
  </table>
  <p>Pengeluaran bulan <?php echo $bulan; ?>:</p>
  <table style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Kegiatan</th>
        <th>Keterangan</th>
        <th>Tanggal </th>
        <th>Nominal</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php $no = 1; ?>
        <?php foreach($result10 as $data_pengeluaran): ?>
        <td><?= $no++ ?></td>
        <td><?php echo $data_pengeluaran['nama_pengeluaran'] ?></td>
        <td><?php echo $data_pengeluaran['keterangan_pengeluaran'] ?></td>
        <td><?php echo $data_pengeluaran['tgl_pengeluaran'] ?></td>
        <td>Rp. <?php echo $data_pengeluaran['nominal_pengeluaran'] ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4">Total Pengeluaran Bulan <?php echo $bulan; ?></td>
        <td colspan="1">Rp. <?php echo $total_pengeluaran['total_pengeluaran'];?></td>
      </tr>
    </tfoot>
  </table>
  <script>
  window.print();
  </script>
</body>
</html>
