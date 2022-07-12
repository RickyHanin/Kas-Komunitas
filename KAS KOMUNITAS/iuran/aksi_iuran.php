<?php
    include '../koneksi.php';

    if(isset($_POST['submit-iuran'])){
        $nama = $_POST['nama'];
        $ket = $_POST['ket'];
        $tgl = $_POST['tgl'];
        $nominal = $_POST['nom'];
        $bulan = $_POST['bulan'];
        
        
        $query= "insert into iuran(nama_iuran,keterangan_iuran,tgl_iuran,nominal_iuran,bulan) values ('$nama','$ket','$tgl','$nominal','$bulan')";
        
        if (mysqli_query($koneksi, $query) == 'true'){
            header('location:iuran.php?pesan_tambah=berhasil' );
        }else{
            header('location:iuran.php?pesan_tambah=gagal' );
        }

    }else if(isset($_GET['del'])){
        $id= $_GET['id'];

        $query= "delete from iuran where id_iuran=$id";
        if (mysqli_query($koneksi,$query)=='true'){
            header('location:iuran.php?pesan_hapus=berhasil' );
        }else{
            header('location:iuran.php?pesan_hapus=gagal' );
        }
        
    }else if(isset($_POST['edit-iuran'])){
        $id= $_POST['id_iuran'];
        $nama = $_POST['nama'];
        $ket = $_POST['ket'];
        $tgl = $_POST['tgl'];
        $nominal = $_POST['nom'];
        $bulan = $_POST['bulan'];

        $query= "update iuran set keterangan_iuran='$ket',tgl_iuran='$tgl',nominal_iuran='$nominal',bulan='$bulan' where nama_iuran='$nama'";
        if (mysqli_query($koneksi,$query)=='true'){
            header('location:iuran.php?pesan_edit=berhasil' );
        }else{
            header('location:iuran.php?pesan_edit=berhasil' );
        }
    }
?>
