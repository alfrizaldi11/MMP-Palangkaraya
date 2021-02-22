<?php
error_reporting(0); 
include 'config/koneksi.php';
  session_start();

  $id_outlet = $_POST['id_outlet'];
  $nama_outlet = $_POST ['nama_outlet'];
  $nama_owner = $_POST ['nama_owner'];
  $no_tlp = $_POST ['no_tlp'];
  $alamat = $_POST ['alamat'];
  $kecamatan = $_POST ['kecamatan'];
  $kelurahan = $_POST ['kelurahan'];
 
  if (empty($nama_outlet)) {
	echo "<script> alert('Tidak ada nama outlet yang di masukkan'); window.location='outlet.php';</script>";
}
	   else {
		   $update="UPDATE outlet SET nama_outlet='$nama_outlet', nama_owner='$nama_owner', no_tlp='$no_tlp', alamat='$alamat', kecamatan='$kecamatan', kelurahan='$kelurahan' WHERE id_outlet='$id_outlet'";
	   
   }
$cek = mysqli_query($koneksi, $update);

if($cek){
   
   echo "<script> alert ('data outlet berhasil di ubah');
   window.location = 'outlet.php'</script>";
   } else {
	   echo "<script> alert ('data outlet gagal di ubah');
	   window.location = 'outlet.php'</script>";
}
?>
