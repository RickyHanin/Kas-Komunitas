<?php
    session_start();
    include 'koneksi.php';
    

    //mengambil data dari form login

    $username = $_POST['username'];
    $password = $_POST['password'];
    

    //seleksi data

    $login = mysqli_query($koneksi,"select * from pengguna where ussername = '$username' and password ='$password '");

    //menghitung jumlah data

    $cek= mysqli_num_rows($login);

    if($cek > 0 ){
        $data = mysqli_fetch_assoc($login);

        if($data['level']=="admin"){

            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "admin";
            // alihkan ke halaman dashboard admin
            header("location:das_admin.php");
            
          
           // cek jika user login sebagai komunitas
           }else if($data['level']=="komunitas"){
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "komunitas";
            // alihkan ke halaman dashboard komunitas
            header("location:das_komunitas.php");
          
           }else{
          
            // alihkan ke halaman login kembali
            header("location:index.php?pesan=gagal");
           } 
    }else{
        header("location:index.php?pesan=gagal");
    }
?>
    