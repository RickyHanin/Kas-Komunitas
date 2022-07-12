<?php
    include '../koneksi.php';
    $id1= $_GET['id'];
    $id2= $_GET['id2'];
    if(isset($_POST['submit-kas'])){
        $bulan = $_POST['bulan'];
        $tgl = $_POST['tgl'];
      
        $query= "insert into kas(id_pengguna,bulan,tgl_bayar,nominal) values ('$id1','$bulan','$tgl','20000')";
        
        if (mysqli_query($koneksi, $query) == 'true'){
            header('Location:detail_kas.php?id='.$id1.'&pesan_tambah=berhasil' );
        }else{
            header('Location:detail_kas.php?id='.$id1.'&pesan_tambah=gagal' );
        }

    }else if(isset($_GET['del'])){
        $id2= $_GET['id2'];
        $id3= $_GET['id'];
        $query= "delete from kas where id_kas=$id2";
        if (mysqli_query($koneksi,$query)=='true'){
            header('location:detail_kas.php?id='.$id3.'&pesan_hapus=berhasil' );
        }else{
            header('location:detail_kas.php?id='.$id3.'&pesan_hapus=gagal' );
        }
        
    }else if(isset($_POST['edit-kas'])){
        $id4= $_GET['id4'];
        $id5= $_GET['id5'];
        $bulan = $_POST['bulan'];
        $tgl = $_POST['tgl'];
        $nominal = $_POST['nom'];

        $query= "update kas set tgl_bayar='$tgl',nominal='20000' where id_kas='$id5'";
        if (mysqli_query($koneksi,$query)=='true'){
            header('Location:detail_kas.php?id='.$id4.'&pesan_edit=berhasil' );
        }else{
            header('Location:detail_kas.php?id='.$id4.'&pesan_edit=gagal' );
        }
    }
?>
