<?php 

include 'config/koneksi.php';
//error_reporting(0);

$w_request = $_POST ['w_request'];
$w_selesai = $_POST ['w_selesai'];
$nama_outlet = $_POST ['id_outlet'];
$spanduk = $_POST ['spanduk'];
$jumlah = $_POST ['jumlah'];
$status = $_POST ['status'];
$nama_user = $_POST ['nama_user'];

 
$query = mysqli_query($koneksi,"INSERT INTO branding (w_request,w_selesai,id_outlet,spanduk,jumlah,status,nama_user)
                    VALUES ('$w_request','$w_selesai','$nama_outlet','$spanduk','$jumlah','$status','$nama_user')");
                    
 if($query){ 
  echo "<script> alert('Data Branding berhasil disimpan');
  window.location = 'branding.php'</script>";
 }else{ 
 echo "<script> alert ('Data Branding Gagal disimpan');
window.location = 'branding.php'</script>";
 }
 ?>  