<?php 

include 'config/koneksi.php';
//error_reporting(0);

$nama_lengkap = $_POST ['nama_lengkap'];
$nama_user = $_POST ['nama_user'];
$mypassword = $_POST ['mypassword'];
$hak_akses = $_POST ['hak_akses'];



 $cekreg=mysqli_query($koneksi,"SELECT * from akun where nama_user ='$nama_user'");
 if(mysqli_num_rows($cekreg) > 0){
	echo "<script>alert('$nama_user sudah terdaftar'); 
	window.location='akun.php';</script>";
	} else {
 
$query = mysqli_query($koneksi,"INSERT INTO akun (nama_lengkap,nama_user,mypassword,hak_akses)
					VALUES ('$nama_lengkap','$nama_user','$mypassword','$hak_akses')");
	}
 if($query){ 
  echo "<script> alert('Data Akun berhasil disimpan');
  window.location = 'akun.php'</script>";
 }else{ 
 echo "<script> alert ('Data Akun Gagal disimpan');
window.location = 'akun.php'</script>";
 }
 ?>  