<?php 
include 'config/koneksi.php';
session_start();
if (empty ($_SESSION['nama_user']) AND empty ($_SESSION['mypassword']) ){
  echo "<script> alert('Anda harus login terlebih dahulu');
  window.location = 'login.php'</script>";
}
if($_SESSION['hak_akses']!="admin"){
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
    include 'sidebar.php';

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
	$edit=mysqli_query($koneksi,"SELECT * FROM outlet where id_outlet ='$_GET[id]'");
    $hasil = mysqli_fetch_array($edit);
	$id_outlet = $hasil['id_outlet'];
    $nama_outlet = $hasil['nama_outlet'];
    $nama_owner = $hasil['nama_owner'];
    $no_tlp = $hasil['no_tlp'];
    $alamat = $hasil['alamat'];
    $kecamatan = $hasil['kecamatan'];
    $kelurahan = $hasil['kelurahan'];
    $kota = $hasil['kota'];
	?>

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="font-weight-bold text-primary">Edit Outlet</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">
            <form enctype='multipart/form-data' action="aksi_edit_outlet.php" method="POST">
            <input type="hidden" name="id_outlet" value="<?php echo $id_outlet; ?>"/>
              <div class="box-body">
				        

                <div class="form-group">
                  <label>Nama Outlet</label>
                  <input value="<?php echo $nama_outlet; ?>" name="nama_outlet" type="text" class="form-control" placeholder="Masukkan nama outlet (jika kosong masukan '-')" required>
                </div>

                <div class="form-group">
                  <label>Nama Owner</label>
                  <input value="<?php echo $nama_owner; ?>" name="nama_owner" type="text" class="form-control" placeholder="Masukkan nama owner (jika kosong masukan '-')" required>
                </div>

                <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input value="<?php echo $no_tlp; ?>" name="no_tlp" type="number" class="form-control" placeholder="Masukkan nomor telepon (jika kosong masukan '-')" required>
                </div>

                <div class="form-group">
                  <label>Alamat Outlet</label>
                  <input value="<?php echo $alamat; ?>" name="alamat" type="text" class="form-control" placeholder="Masukkan alamat outlet (jika kosong masukan '-')" required>
                </div>

                <div class="form-group">
                      <label>Kecamatan</label>
                      <select name="kecamatan" class="form-control" data-size="4" required>
                        <option value="<?php echo $kecamatan; ?>"><?php echo $kecamatan; ?></option>
                        <option value="">-</option>
                        <option value="Pahandut">Pahandut</option>
                        <option value="Jekan Raya">Jekan Raya</option>
                        <option value="Sebangau">Sebangau</option>
                        <option value="Bukit Batu">Bukit Batu</option>
                        <option value="Rakumpit">Rakumpit</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Kelurahan</label>
                      <select name="kelurahan" class="form-control" data-size="5" required>
                        <option value="<?php echo $kelurahan; ?>"><?php echo $kelurahan; ?></option>
                        <option value="">-</option>
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