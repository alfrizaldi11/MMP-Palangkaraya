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

        <section class="content-header">
      
     
    </section>

	<?php
	$edit=mysqli_query($koneksi,"SELECT * FROM akun where id_akun ='$_GET[id]'");
    $hasil = mysqli_fetch_array($edit);
	  $id_akun = $hasil['id_akun'];
    $nama_lengkap = $hasil['nama_lengkap'];
    $nama_user = $hasil['nama_user'];
    $mypassword = $hasil['mypassword'];
	?>

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="font-weight-bold text-primary">Edit Akun</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">
            <form enctype='multipart/form-data' action="aksi_edit_akun.php" method="POST">
            <input type="hidden" name="id_akun" value="<?php echo $id_akun; ?>"/>
              <div class="box-body">
				        
                <div class="form-group">
                  <label>Nama Lengkap (Sales)</label>
                  <input value="<?php echo $nama_lengkap; ?>" name="nama_lengkap" type="text" class="form-control" placeholder="Masukkan Nama Lengkap(jika kosong masukan '-')" required>
                </div>

                <div class="form-group">
                  <label>Username (Sales)</label>
                  <input value="<?php echo $nama_user; ?>" name="nama_user" type="text" class="form-control" placeholder="Masukkan Username(jika kosong masukan '-')" required>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input name="mypassword" type="text" class="form-control" placeholder="Masukkan Password Baru" required>
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


</body>

</html>