<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename=Data Branding.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Laporan Branding</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
		border: 1px solid #3c3c3c;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

<h3>Laporan Data Branding</h3>

<table>
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

        echo 
        '<tr>
        <td style="background:#EEE;font-weight:bold;">No.</td>
        <td style="background:#EEE;font-weight:bold;">Waktu Permintaan</td>
        <td style="background:#EEE;font-weight:bold;">Waktu Selesai</td>
        <td style="background:#EEE;font-weight:bold;">Nama Outlet</td>
        <td style="background:#EEE;font-weight:bold;">Spanduk</td>
        <td style="background:#EEE;font-weight:bold;">Jumlah</td>
        <td style="background:#EEE;font-weight:bold;">Status</td>
        <td style="background:#EEE;font-weight:bold;">Alamat</td>
        <td style="background:#EEE;font-weight:bold;">Kecamatan</td>
        <td style="background:#EEE;font-weight:bold;">Kelurahan</td>
        <td style="background:#EEE;font-weight:bold;">Nama Owner</td>
        <td style="background:#EEE;font-weight:bold;">Nomor Telepon</td>
        <td style="background:#EEE;font-weight:bold;">Nama Sales</td>
        </tr>';

		
		$no = 1;
        while ($data = $data_branding->fetch_assoc()) {
        

        echo "<tr>";
            echo "<td>".$no."</td>";
            echo "<td>".date('d-M-Y', strtotime($data['w_request']))."</td>";
            echo "<td>".date('d-M-Y', strtotime($data['w_selesai']))."</td>";
            echo "<td>".$data['nama_outlet']."</td>";
            echo "<td>".$data['spanduk']."</td>";
            echo "<td>".$data['jumlah']."</td>";
            echo "<td>".$data['status']."</td>";
            echo "<td>".$data['alamat']."</td>";
            echo "<td>".$data['kecamatan']."</td>";
            echo "<td>".$data['kelurahan']."</td>";
            echo "<td>".$data['nama_owner']."</td>";
            echo "<td>".$data['no_tlp']."</td>";
            echo "<td>".$data['nama_lengkap']."</td>";
        echo "</tr>";
        $no++;
		}
        ?>
        
	</table>
    </body>
</html>