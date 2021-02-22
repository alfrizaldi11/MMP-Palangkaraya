<?php 
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include "config/koneksilogin.php";

 
// menangkap data yang dikirim dari form login
$username = $_POST['nama_user'];
$pass = $_POST['mypassword'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM akun where nama_user='$username' and mypassword='$pass'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
 
  $data = mysqli_fetch_assoc($login);
  // cek jika user login sebagai admin
  if($data['hak_akses']=="admin"){
    // buat session login dan username
    $_SESSION['nama_user'] = $username;
    $_SESSION['hak_akses'] = "admin";
    // alihkan ke halaman dashboard admin
    header("location:index.php");

  }else if($data['hak_akses']=="sales"){
    // buat session login dan username
    $_SESSION['nama_user'] = $username;
    $_SESSION['hak_akses'] = "sales";
    header("location:index.php");
 
 
  }else{
    // alihkan ke halaman login kembali
    echo "<script> alert('Username atau Password anda salah');
    window.location = 'login.php'</script>";
  } 
}else{ 
    echo "<script> alert('Username atau Password anda salah');
    window.location = 'login.php'</script>";
}


?>


