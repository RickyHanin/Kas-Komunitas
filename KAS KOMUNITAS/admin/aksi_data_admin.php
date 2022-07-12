<?php
    include '../koneksi.php';

    if(isset($_POST['submit-admin'])){
        $nama = $_POST['nama'];
        $username= $_POST['username'];
        $password = $_POST['password'];
        $level= 'admin';
        
        $query= "insert into pengguna(nama,ussername,password,level) values ('$nama','$username','$password','$level')";
        
        if (mysqli_query($koneksi, $query) == 'true'){
            header('location:data_admin.php?pesan_tambah=berhasil' );
        }else{
            header('location:data_admin.php?pesan_tambah=gagal' );
        }

    }else if(isset($_GET['del'])){
        $id= $_GET['id'];

        $query= "delete from pengguna where id_pengguna=$id";
        if (mysqli_query($koneksi,$query)=='true'){
            header('location:data_admin.php?pesan_hapus=berhasil' );
        }else{
            header('location:data_admin.php?pesan_hapus=gagal' );
        }
        
    }else if(isset($_POST['edit-admin'])){
        $id= $_POST['id_pengguna'];
        $nama = $_POST['nama'];
        $username= $_POST['username'];
        $password = $_POST['password'];

        $query= "update pengguna set nama='$nama',ussername='$username',password='$password' where nama='$nama'";
        if (mysqli_query($koneksi,$query)=='true'){
            header('location:data_admin.php?pesan_edit=berhasil' );
        }else{
            header('location:data_admin.php?pesan_edit=berhasil' );
        }
    }
?>
