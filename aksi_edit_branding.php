<?php
//error_reporting(0); 
include 'config/koneksi.php';
  session_start();

 $id_branding = $_POST['id_branding'];
 $w_request = $_POST['w_request'];
 $w_selesai = $_POST['w_selesai'];
 $nama_outlet = $_POST['id_outlet'];
 $spanduk = $_POST['spanduk'];
 $jumlah = $_POST['jumlah'];
 $status = $_POST['status'];
 $nama_user = $_POST['nama_user'];
 
if (empty($nama_outlet)) {
     echo "<script> alert('Tidak ada outlet yang di masukkan'); window.location='branding.php';</script>";
}
		else {
			$update="UPDATE branding set w_request='$w_request', w_selesai='$w_selesai', id_outlet='$nama_outlet', spanduk='$spanduk', jumlah='$jumlah', status='$status', nama_user='$nama_user' where id_branding='$id_branding'";
		
	}
$cek = mysqli_query($koneksi, $update);

if($cek){
    
	echo "<script> alert ('data branding berhasil di ubah');
	window.location = 'branding.php'</script>";
	} else {
		echo "<script> alert ('data branding gagal di ubah');
		window.location = 'branding.php'</script>";
}
?>
