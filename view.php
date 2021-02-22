<?php 

include 'config/koneksi.php';
                        
if (isset($_POST['submit'])) {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $cari = $_POST['cari'];
  
    if (!empty($date1) && !empty($date2) && !empty($cari)) {
          // perintah tampil data berdasarkan periode 
          $data_branding = mysqli_query($koneksi, "SELECT o.*, b.*, a.* FROM branding b LEFT JOIN outlet o ON o.`id_outlet` = b.`id_outlet` LEFT JOIN akun a ON a.`nama_user` = b.`nama_user` WHERE w_request BETWEEN '$date1' and '$date2' AND nama_outlet LIKE '%".$cari."%' ");
      } else {
          if (!empty($cari)) {
                  // perintah tampil data berdasarkan periode 
                  $data_branding = mysqli_query($koneksi, "SELECT o.*, b.*, a.* FROM branding b LEFT JOIN outlet o ON o.`id_outlet` = b.`id_outlet` LEFT JOIN akun a ON a.`nama_user` = b.`nama_user` WHERE nama_outlet LIKE '%".$cari."%'");
              } else {
                    if (!empty($date1) && !empty($date2)) {
                      // perintah tampil data berdasarkan periode 
                      $data_branding = mysqli_query($koneksi, "SELECT o.*, b.*, a.* FROM branding b LEFT JOIN outlet o ON o.`id_outlet` = b.`id_outlet` LEFT JOIN akun a ON a.`nama_user` = b.`nama_user` WHERE w_request BETWEEN '$date1' and '$date2'");
                  } else {
                      // perintah tampil semua data
                      $data_branding = mysqli_query($koneksi, "SELECT o.*, b.*, a.* FROM branding b LEFT JOIN outlet o ON o.`id_outlet` = b.`id_outlet` LEFT JOIN akun a ON a.`nama_user` = b.`nama_user` order by o.nama_outlet ASC");
                  }
              }
      }

}else {
// perintah tampil semua data
$data_branding = mysqli_query($koneksi, "SELECT o.*, b.*, a.* FROM branding b LEFT JOIN outlet o ON o.`id_outlet` = b.`id_outlet` LEFT JOIN akun a ON a.`nama_user` = b.`nama_user` order by o.nama_outlet ASC");
}


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Laporan</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="style-screen.css" type="text/css" media="screen">
    <link rel="stylesheet" href="style-print.css" type="text/css" media="print">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body onLoad="window.print()">
<table border=0 width=100%>
<tr>
    <td align="center" rowspan='3' width='100%'><img src='img/mmp.jpg' width='40%'></td>
</tr>  
</table>
<hr style='border:1px solid #000'>

<table width=100%>
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center>Laporan Data Branding</h3></td>
</tr> 
</table>
<br>
<br>
	<table border="1" align="center" style="width: 80%;">
        <thead align="center">
		<tr>
                    <th>No</th>
                    <th>Waktu Permintaan</th>
                    <th>Waktu Selesai</th>
                    <th>Nama Outlet</th>
                    <th>Spanduk</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Alamat</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Nama Owner</th>
                    <th>Nomor Telepon</th>
                    <th>Nama Sales</th>
		</tr>
        </thead>
		<?php 
		$no = 1;
        while ($data = $data_branding->fetch_assoc()) {
        ?>

		<tr>
                    <td align="center"><?php echo $no++; ?></td>
                    <td align="center"><?php echo date('d-M-Y', strtotime($data['w_request'])); ?></td>
                    <td align="center"><?php echo date('d-M-Y', strtotime($data['w_selesai'])); ?></td>
                    <td align="center"><?php echo $data['nama_outlet']; ?></td>
                    <td align="center"><?php echo $data['spanduk']; ?></td>
                    <td align="center"><?php echo $data['jumlah']; ?></td>
                    <td align="center"><?php echo $data['status']; ?></td>
                    <td align="center"><?php echo $data['alamat']; ?></td>
                    <td align="center"><?php echo $data['kecamatan']; ?></td>
                    <td align="center"><?php echo $data['kelurahan']; ?></td>
                    <td align="center"><?php echo $data['nama_owner']; ?></td>
                    <td align="center"><?php echo $data['no_tlp']; ?></td>
                    <td align="center"><?php echo $data['nama_lengkap']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
 
</body>
</html>