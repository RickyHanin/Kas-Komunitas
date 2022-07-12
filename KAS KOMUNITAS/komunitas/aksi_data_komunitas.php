<?php
    include '../koneksi.php';

    if(isset($_POST['submit-komunitas'])){
        $nama = $_POST['nama'];
        $no= $_POST['no'];
        $level= 'komunitas';
        
        $query= "insert into pengguna(nama,ussername,password,level) values ('$nama','$nama','$no','$level')";
        
        if (mysqli_query($koneksi, $query) == 'true'){
            header('location:data_komunitas.php?pesan_tambah=berhasil' );
        }else{
            header('location:data_komunitas.php?pesan_tambah=gagal' );
        }

    }else if(isset($_GET['del'])){
        $id= $_GET['id'];

        $query= "delete from pengguna where id_pengguna=$id";
        $query2= "delete from kas where id_pengguna=$id";
        if (mysqli_query($koneksi,$query)&&mysqli_query($koneksi,$query2) ){
            header('location:data_komunitas.php?pesan_hapus=berhasil' );
        }else{
            header('location:data_komunitas.php?pesan_hapus=gagal' );
        }
        

    }else if(isset($_POST['edit-komunitas'])){
        $id= $_POST['id_pengguna'];
        $nama = $_POST['nama'];
        $no= $_POST['no'];

        $query= "update pengguna set nama='$nama', ussername='$nama', password='$no'  where nama='$nama'";
        if (mysqli_query($koneksi,$query)=='true'){
            header('location:data_komunitas.php?pesan_edit=berhasil' );
        }else{
            header('location:data_komunitas.php?pesan_edit=berhasil' );
        }
    }
?>
