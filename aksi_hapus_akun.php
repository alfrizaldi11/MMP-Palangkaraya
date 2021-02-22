<?php
include 'config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM akun WHERE id_akun='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Akun Berhasil');
window.location='akun.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Akun Gagal');
history.back(); </script>";
}
?>