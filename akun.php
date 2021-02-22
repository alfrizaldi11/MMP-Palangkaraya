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




$data_akun = mysqli_query($koneksi,"SELECT * FROM akun WHERE hak_akses='sales'");

?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'head.php';


?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php
include 'sidebarakun.php';

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
        <div class="form-actions">
          <a href="tambah_akun.php"class="btn btn-primary" role="button">Tambah Data</a>            
        </div>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-danger">Data Akun</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead align="center">
              <tr>
                <th>No</th> 
                <th>Nama Lengkap (Sales)</th> 
                <th>Username (Sales)</th> 
                <th>Password</th>
                <th>Hak Akses</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
            <?php
              if($_SESSION['hak_akses'] == 'admin'){ // Jika role-nya akun
            ?>
            <?php
              $no = 1;
              while ($data = mysqli_fetch_array($data_akun)) {
            ?>
            
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td align="center"><?php echo $data['nama_lengkap']; ?></td>
              <td align="center"><?php echo $data['nama_user']; ?></td>
              <td align="center"><?php echo $data['mypassword']; ?></td>
              <td align="center"><?php echo $data['hak_akses']; ?></td>
            
              <td align="center">

                <?php
                  // Cek role user
                  if($_SESSION['hak_akses'] == 'admin'){ // Jika role-nya akun
                  ?>
                <div>
                  <a class="btn btn-success btn-circle" 
                    href="edit_akun.php?id=<?php echo $data['id_akun'];?>"><i class="fas fa-info-circle"></i></a>
                </div>
                <br>
                <div>
                  <a class="btn btn-danger btn-circle"
                    href="aksi_hapus_akun.php?&id=<?php echo $data['id_akun'];?>" 
                    onclick="return confirm('Yakin akan dihapus ?');"><i class="fas fa-trash"></i></a>
                </div>
                  <?php
                    }
                  ?>
              </td>


            </tr>

            <?php } ?>

            <?php
            }
            ?>

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

</body>

</html>