<?php
include 'config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];

$sql = mysqli_query($koneksi,"DELETE FROM outlet WHERE id_outlet='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Outlet Berhasil');
window.location='outlet.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Outlet Gagal');
history.back(); </script>";
}
?>