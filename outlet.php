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

$data_outlet = mysqli_query($koneksi,"SELECT * FROM outlet order by id_outlet ASC");

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
              <div class="form-actions">
                    <a href="tambah_outlet.php"class="btn btn-primary" role="button">Tambah Data</a>            
              </div>
<br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-danger">Data Outlet</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>No</th>
                      <th>Nama Outlet</th>
                      <th>Nama Owner</th>
                      <th>Nomor Telepon</th>
                      <th>Alamat Outlet</th>
                      <th>Kecamatan</th>
                      <th>Kelurahan</th>
                      <th>Menu</th>
                    </tr>
                  </thead>

                  <tbody>

                  <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($data_outlet)) {
                  ?>
                  

                  <tr>

                    <td align="center"><?php echo $no++; ?></td>
                    <td align="center"><?php echo $data['nama_outlet']; ?></td>
                    <td align="center"><?php echo $data['nama_owner']; ?></td>
                    <td align="center"><?php echo $data['no_tlp']; ?></td>
                    <td align="center"><?php echo $data['alamat']; ?></td>
                    <td align="center"><?php echo $data['kecamatan']; ?></td>
                    <td align="center"><?php echo $data['kelurahan']; ?></td>

                    <td align="center">
                      <div>
                        <a class="btn btn-success btn-circle" 
                          href="edit_outlet.php?id=<?php echo $data['id_outlet'];?>"><i class="fas fa-info-circle"></i></a>
                      </div>
                      <br>
                      <div>
                        <a class="btn btn-danger btn-circle"
                          href="aksi_hapus_outlet.php?&id=<?php echo $data['id_outlet'];?>" 
                          onclick="return confirm('Yakin akan dihapus ?');"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>


                  </tr>

                  <?php } ?>

                  </tbody>
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

</body>

</html>