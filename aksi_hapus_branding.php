<?php
include 'config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM branding WHERE id_branding='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Branding Berhasil');
window.location='branding.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Branding Gagal');
history.back(); </script>";
}
?>