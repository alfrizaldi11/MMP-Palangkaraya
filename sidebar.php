    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
        <?php
          // Cek role user
        if($_SESSION['hak_akses'] == 'admin'){ // Jika role-nya admin
        ?>
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
          <div class="sidebar-brand-icon">
            <i class="fas fa-user"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Admin </div>
        </a>
        <?php
        }
        ?>

      <?php
          // Cek role user
        if($_SESSION['hak_akses'] == 'sales'){ // Jika role-nya admin
        ?>
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
          <div class="sidebar-brand-icon">
            <i class="fas fa-users"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Sales </div>
        </a>
        <?php
        }
        ?>
  
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
  
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
        </li>

        <?php
      // Cek role user
      if($_SESSION['hak_akses'] == 'admin'){ // Jika role-nya admin
        ?>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="akun.php">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kelola Akun</span></a>
        </li>
        <?php
        }
        ?>
  
        <!-- Divider -->
        <hr class="sidebar-divider">
  
        <!-- Heading -->
        <div class="sidebar-heading">
          Atur
        </div>

        <?php
      // Cek role user
      if($_SESSION['hak_akses'] == 'admin'){ // Jika role-nya admin
        ?>
  
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Halaman</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Atur Data</h6>
              <a class="collapse-item" href="branding.php">Kelola Branding</a>
              <a class="collapse-item" href="outlet.php">Kelola Outlet</a>
              <a class="collapse-item" href="laporan.php">Kelola Laporan</a>
          </div>
        </li>
        <?php
        }
        ?>

      <?php
      // Cek role user
      if($_SESSION['hak_akses'] == 'sales'){ // Jika role-nya admin
        ?>
  
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Halaman</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Atur Data</h6>
              <a class="collapse-item" href="branding.php">Kelola Branding</a>
          </div>
        </li>
        <?php
        }
        ?>
  
       
  
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
  
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
  
      </ul>
      <!-- End of Sidebar -->