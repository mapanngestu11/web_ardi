    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Admin/Homepage/') ?>">
        <div class="sidebar-brand-icon">
          <!-- <img src="<?php echo base_url()."assets/Admin/"; ?>img/logo/logo2.png"> -->
        </div>
        <div class="sidebar-brand-text mx-3">Administrator</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('Admin/Homepage/') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Tampilan Dashboard
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Banner/') ?>">
            <i class="fas fa-fw fa-images"></i>
            <span>Data Banner</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Kegiatan/') ?>">
            <i class="fas fa-fw fa-pen"></i>
            <span>Data Kegiatan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Pegawai/') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pegawai</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Data Warga
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Warga/') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Warga</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Data Bantuan Sosial
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Bansos/') ?>">
            <i class="fas fa-fw fa-box"></i>
            <span>Data Bantuan Sosial</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Laporan
        </div>
        

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Bansos/Laporan_bansos') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Pengaturan
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/User/') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>User Pengguna</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="version" id="version-ruangadmin"></div>
      </ul>