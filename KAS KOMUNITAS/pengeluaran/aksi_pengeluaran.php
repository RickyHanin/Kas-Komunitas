<?php
    include '../koneksi.php';

    if(isset($_POST['submit-pengeluaran'])){
        $nama = $_POST['nama'];
        $ket = $_POST['ket'];
        $tgl = $_POST['tgl'];
        $nominal = $_POST['nom'];
        $bulan = $_POST['bulan'];
        
        
        $query= "insert into pengeluaran(nama_pengeluaran,keterangan_pengeluaran,tgl_pengeluaran,nominal_pengeluaran,bulan) values ('$nama','$ket','$tgl','$nominal','$bulan')";
        
        if (mysqli_query($koneksi, $query) == 'true'){
            header('location:pengeluaran.php?pesan_tambah=berhasil' );
        }else{
            header('location:pengeluaran.php?pesan_tambah=gagal' );
        }

    }else if(isset($_GET['del'])){
        $id= $_GET['id'];

        $query= "delete from pengeluaran where id_pengeluaran=$id";
        if (mysqli_query($koneksi,$query)=='true'){
            header('location:pengeluaran.php?pesan_hapus=berhasil' );
        }else{
            header('location:pengeluaran.php?pesan_hapus=gagal' );
        }
        
    }else if(isset($_POST['edit-pengeluaran'])){
        $id= $_POST['id_pengeluaran'];
        $nama = $_POST['nama'];
        $ket = $_POST['ket'];
        $tgl = $_POST['tgl'];
        $nominal = $_POST['nom'];
        $bulan = $_POST['bulan'];

        $query= "update pengeluaran set keterangan_pengeluaran='$ket',tgl_pengeluaran='$tgl',nominal_pengeluaran='$nominal',bulan='$bulan' where nama_pengeluaran='$nama'";
        if (mysqli_query($koneksi,$query)=='true'){
            header('location:pengeluaran.php?pesan_edit=berhasil' );
        }else{
            header('location:pengeluaran.php?pesan_edit=berhasil' );
        }
    }
?>
