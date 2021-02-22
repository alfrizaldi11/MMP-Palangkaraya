<?php 
include 'config/koneksi.php';
session_start();
if (empty ($_SESSION['nama_user']) AND empty ($_SESSION['mypassword']) ){
  echo "<script> alert('Anda harus login terlebih dahulu');
  window.location = 'login.php'</script>";
}
if($_SESSION['hak_akses']!="admin" AND ($_SESSION['hak_akses']!="sales")){
  die("404 Not Found");
}




?>

<!DOCTYPE html>
<html lang="en">

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

    <?php
    include 'head.php';

    ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

      <?php
    include 'sidebaradmin.php';

    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

            <?php
      include 'topbar.php';

      ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <section class="content-header">
      
     
    </section>

	<?php
	$edit=mysqli_query($koneksi,"SELECT o.*, b.*, a.* FROM branding b LEFT JOIN outlet o ON o.`id_outlet` = b.`id_outlet` LEFT JOIN akun a ON a.`nama_user` = b.`nama_user` where b.id_branding = $_GET[id]");
  $hasil = mysqli_fetch_array($edit);
	$id_branding = $hasil['id_branding'];
    $w_request = $hasil ['w_request'];
    $w_selesai = $hasil ['w_selesai'];
    $id_outlet = $hasil ['id_outlet'];
    $spanduk = $hasil ['spanduk'];
    $jumlah = $hasil ['jumlah'];
    $harga = $hasil ['harga'];
    $status = $hasil ['status'];
    $nama_user = $hasil ['nama_user'];
	?>

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="font-weight-bold text-danger">Edit Branding</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">

            <form enctype='multipart/form-data' action="#" method="POST">
                    <div class="form-group">
                          <label class="font-weight-bold text-danger">Filter Outlet</label>
                          <div class="form-group">
                          <label>Kecamatan&nbsp;</label>
                          <select name="kecamatan" class="form-control" data-size="4" required>
                            <option value="">--Pilih Kecamatan--</option>
                            <option value="Pahandut">Pahandut</option>
                            <option value="Jekan Raya">Jekan Raya</option>
                            <option value="Sebangau">Sebangau</option>
                            <option value="Bukit Batu">Bukit Batu</option>
                            <option value="Rakumpit">Rakumpit</option>
                          </select>
                        </div>
                        </div>

                        <div class="form-group">
                          <label>Kelurahan&nbsp;</label>
                          <select name="kelurahan" class="form-control" data-size="5">
                            <option value="">--Pilih Kelurahan--</option>
                            <option value="Pahandut">Pahandut</option>
                            <option value="Langkai">Langkai</option>
                            <option value="Panarung">Panarung</option>
                            <option value="Pahandut Seberang">Pahandut Seberang</option>
                            <option value="Tanjung Pinang">Tanjung Pinang</option>
                            <option value="Tumbang Rungan">Tumbang Rungan</option>
                            <option value="Menteng">Menteng</option>
                            <option value="Palangka">Palangka</option>
                            <option value="Bukit Tunggal">Bukit Tunggal</option>
                            <option value="Petuk Ketimpun">Petuk Ketimpun</option>
                            <option value="Bereng Bengkel">Bereng Bengkel</option>
                            <option value="Kereng Benkirai">Kereng Bengkirai</option>
                            <option value="Sabaru">Sabaru</option>
                            <option value="Kelampangan">Kelampangan</option>
                            <option value="Kameloh Baru">Kameloh Baru</option>
                            <option value="Danau Tundai">Danau Tundai</option>
                            <option value="Tumbang Tahai">Tumbang Tahai</option>
                            <option value="Tangkiling">Tangkiling</option>
                            <option value="Sei Gohong">Sei Gohong</option>
                            <option value="Marang">Marang</option>
                            <option value="Kanarakan">Kanarakan</option>
                            <option value="Banturung">Banturung</option>
                            <option value="Habaring Hurung">Habaring Hurung</option>
                            <option value="Bukit Sua">Bukit Sua</option>
                            <option value="Gaung Baru">Gaung Baru</option>
                            <option value="Mungku Baru">Mungku Baru</option>
                            <option value="Pager">Pager</option>
                            <option value="Panjehang">Panjehang</option>
                            <option value="Petuk Barunai">Petuk Barunai</option>
                            <option value="Petuk Bukit">Petuk Bukit</option>
                          </select>
                        </div>

                        <div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-filter"></i>  Filter</button>
                        </div>
                    </form>

                    <?php

                            if (isset($_POST['submit'])) {
                              $kecamatan = $_POST['kecamatan'];
                              $kelurahan = $_POST['kelurahan'];
                            
                              if (!empty($kecamatan) && !empty($kelurahan)) {
                                    // perintah tampil data berdasarkan periode 
                                    $outlet = mysqli_query($koneksi, "SELECT * FROM outlet WHERE kecamatan LIKE '%".$kecamatan."%' AND kelurahan Like '%".$kelurahan."%'");
                                } else {
                                    if (!empty($kecamatan)) {
                                            // perintah tampil
                                            $outlet = mysqli_query($koneksi, "SELECT * FROM outlet WHERE kecamatan LIKE '%".$kecamatan."%'");
                                        } else {
                                            $outlet = mysqli_query($koneksi,"SELECT * from outlet");
                                        }
                              }
                          
                          }else {
                          // perintah tampil semua data
                          $outlet = mysqli_query($koneksi,"SELECT * from outlet");
                          }

                          $t =mysqli_fetch_array($outlet);

                    ?>

                    <hr>
                    <br>

            <form enctype='multipart/form-data' action="aksi_edit_branding.php" method="POST">
            <input type="hidden" name="id_branding" value="<?php echo $id_branding; ?>"/>
              <div class="box-body">
			
              <?php
                $tampil_outlet=mysqli_query($koneksi,"SELECT * FROM outlet where id_outlet='$id_outlet'");
                $data_outlet=mysqli_fetch_array($tampil_outlet);
                $nama_outlet=$data_outlet['nama_outlet'];
              ?>
        

                <div class="form-group">
                  <label>Waktu Permintaan</label>
                  <input value="<?php echo $w_request; ?>" name="w_request" type="date" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Waktu Selesai</label>
                  <input value="<?php echo $w_selesai; ?>" name="w_selesai" type="date" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Nama Outlet</label>
                  <select name="id_outlet" class="form-control" data-size="4" required>
                    <option value="<?php echo $id_outlet; ?>"><?php echo $nama_outlet; ?></option>
                    <option value="">-- Pilih Outlet --</option>
                    <?php
                        echo "<option value=$t[id_outlet]>$t[nama_outlet]</option>";
                    ?>
                  </select>
				        </div>

                <div class="form-group">
                    <label>Spanduk</label>
                    <select name="spanduk" class="form-control" data-size="4" required>
                    <option value="<?php echo $spanduk; ?>"><?php echo $spanduk; ?></option>
                      <option value="">--Pilih Spanduk--</option>
                      <option value="250cm X 150cm (RP.60.000)">250cm X 150cm (RP.60.000)</option>
                      <option value="250cm X 150cm (Free)">250cm X 150cm (Free)</option>
                      <option value="300cm X 150cm (RP.80.000)">300cm X 150cm (RP.80.000)</option>
                      <option value="450cm X 150cm (RP.130.000)">450cm X 150cm (RP.130.000)</option>
                    </select>
                </div>

                <div class="form-group">
                  <label>Jumlah</label>
                  <input value="<?php echo $jumlah; ?>" name="jumlah" type="text" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Status</label>
                    <select name="status" class="form-control" data-size="4" required>
                      <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                      <option value="">--Pilih Status--</option>
                            <option value="Sedang di proses">Sedang di proses</option>
                            <option value="Selesai">Selesai</option>
                    </select>
                </div>

                <div class="form-group">
                  <label>Username (Sales)</label>
                  <input disabled value="<?php echo $_SESSION['nama_user']; ?>" name="nama_user" type="text" class="form-control" placeholder="Masukkan Username(jika kosong masukan '-')" required>
                  <input value="<?php echo $_SESSION['nama_user']; ?>" name="nama_user" type="hidden" class="form-control" required>
                </div>

                <div class="form-actions">
                    <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-save"></i>  Simpan</button>
                </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        </div>
        <!--/.col (right) -->
</section>

      </div>
      <!-- End of Main Content -->

      <?php
        include 'footer.php';

        ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <?php
        include 'logout_modals.php';

    ?>

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

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

  <script>
    $(function () {
      $('select').selectpicker();
  });
  </script>


</body>

</html>