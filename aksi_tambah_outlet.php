<?php 
error_reporting(0);
include 'config/koneksi.php';
//error_reporting(0);

$nama_outlet = $_POST ['nama_outlet'];
$nama_owner = $_POST ['nama_owner'];
$no_tlp = $_POST ['no_tlp'];
$alamat = $_POST ['alamat'];
$kecamatan = $_POST ['kecamatan'];
$kelurahan = $_POST ['kelurahan'];



 $cekreg=mysqli_query($koneksi,"SELECT * from outlet where nama_outlet ='$nama_outlet'");
 if(mysqli_num_rows($cekreg) > 0){
	echo "<script>alert('$nama_outlet sudah terdaftar'); 
	window.location='outlet.php';</script>";
	} else {
 
$query = mysqli_query($koneksi,"INSERT INTO outlet (nama_outlet,nama_owner,no_tlp,alamat,kecamatan,kelurahan)
					VALUES ('$nama_outlet','$nama_owner','$no_tlp','$alamat','$kecamatan','$kelurahan')");
	}
 if($query){ 
  echo "<script> alert('Data Outlet berhasil disimpan');
  window.location = 'outlet.php'</script>";
 }else{ 
 echo "<script> alert ('Data Outlet Gagal disimpan');
window.location = 'outlet.php'</script>";
 }
 ?>  