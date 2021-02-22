<?php
error_reporting(0); 
include 'config/koneksi.php';
  session_start();

 $id_akun = $_POST['id_akun'];
 $nama_lengkap = $_POST['nama_lengkap'];
 $nama_user = $_POST['nama_user'];
 $mypassword = $_POST['mypassword'];
 
if (empty($nama_user)) {
     echo "<script> alert('Tidak ada username yang di masukkan'); window.location='akun.php';</script>";
}
		else {
			$update="UPDATE akun set nama_lengkap='$nama_lengkap', nama_user='$nama_user', mypassword='$mypassword' where id_akun='$id_akun'";
		
	}
$cek = mysqli_query($koneksi, $update);

if($cek){
    
	echo "<script> alert ('data akun berhasil di ubah');
	window.location = 'akun.php'</script>";
	} else {
		echo "<script> alert ('data akun gagal di ubah');
		window.location = 'akun.php'</script>";
}
?>
