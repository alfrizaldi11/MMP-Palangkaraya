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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-danger">Laporan Branding</h4>
            </div>
            <div class="card-body">
            <div class="row">
					<div class="col-md-12">
						<form method="POST" action="" class="form-inline">
              <label for="date1" >Tanggal mulai&nbsp;</label>
              <input type="date" name="date1" id="date1" class="form-control mr-2">
              <label for="date2">Sampai&nbsp;</label>
              <input type="date" name="date2" id="date2" class="form-control mr-2">

              <div class="form-group">
                  <select name="cari" id="cari" class="form-control selectpcker mr-2" data-size="4">
                    <option value="">-- Pilih Outlet --</option>
                      <?php
                      $tampil=mysqli_query($koneksi,"SELECT * FROM outlet ORDER BY nama_outlet");
                      while($data=mysqli_fetch_array($tampil)){
                      echo "<option value=$data[nama_outlet]>$data[nama_outlet]</option>";}
                      ?>
                  </select>
              </div>

              <button type="submit" name="submit" class="btn btn-primary mr-2" style="width:80px;">Cari</button>
              <a class="btn btn-info mr-2" data-toggle="modal" href=# data-target="#exampleModal1">Cetak <i class="fa fa-print"></i></a>
              <a class="btn btn-success mr-2" data-toggle="modal" href=# data-target="#exampleModal2">Download Excel <i class="fa fa-file-excel"></i></a>      
            </form>
					</div>
				</div>
            <div class="mt-3" style="max-height: 500px; overflow-y: auto; overflow-y: auto;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
				</div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  	<!-- Modal -->
<form method="POST" action="view.php" target="_blank" >
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><small>Cetak Laporan</small></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <div class="form-group">
          <label class="control-label">Tanggal mulai</label>
          <input type="date" name="date1" id="stayf" class="form-control">
      </div>
      <div class="form-group">
          <label class="control-label">Sampai</label>
          <input type="date" name="date2" id="stayf"  class="form-control">
      </div>
      <div class="form-group">
        <select name="cari" id="cari" class="form-control selectpcker mr-2" data-size="4">
          <option value="">-- Pilih Outlet --</option>
            <?php
            $tampil=mysqli_query($koneksi,"SELECT * FROM outlet ORDER BY nama_outlet");
            while($data=mysqli_fetch_array($tampil)){
            echo "<option value=$data[nama_outlet]>$data[nama_outlet]</option>";}
            ?>
        </select>
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-info" type="submit" name="submit" value="proses" onclick="return valid();">Cetak</button>
    </div>
</div>  
</div>
</div>
</form>
<!--end modal-->


  	<!-- Modal -->
    <form method="POST" action="excel.php" target="_blank" >
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><small>Download Excel</small></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <div class="form-group">
          <label class="control-label">Tanggal mulai</label>
          <input type="date" name="date1" id="stayf" class="form-control">
      </div>
      <div class="form-group">
          <label class="control-label">Sampai</label>
          <input type="date" name="date2" id="stayf"  class="form-control">
      </div>
      <div class="form-group">
        <select name="cari" id="cari" class="form-control selectpcker mr-2" data-size="4">
          <option value="">-- Pilih Outlet --</option>
            <?php
            $tampil=mysqli_query($koneksi,"SELECT * FROM outlet ORDER BY nama_outlet");
            while($data=mysqli_fetch_array($tampil)){
            echo "<option value=$data[nama_outlet]>$data[nama_outlet]</option>";}
            ?>
        </select>
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-success" type="submit" name="submit" value="proses" onclick="return valid();">Cetak</button>
    </div>
</div>  
</div>
</div>
</form>
<!--end modal-->

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

<!-- <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script> -->

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