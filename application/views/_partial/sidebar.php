  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url();?>" class="brand-link">
      <img src="<?=base_url();?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">DashKeu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url();?>" class="nav-link <?=($this->uri->segment(2) == FALSE || $this->uri->segment(2) == 'index') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?=($this->uri->segment(2) == 'pemasukan' || $this->uri->segment(2) == 'laporan_siswa' || $this->uri->segment(2) == 'rekapitulasi') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?=($this->uri->segment(2) == 'pemasukan' || $this->uri->segment(2) == 'laporan_siswa' || $this->uri->segment(2) == 'rekapitulasi') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Keuangan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('home/pemasukan')?>" class="nav-link <?=($this->uri->segment(2) == 'pemasukan') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemasukan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('home/laporan_siswa')?>" class="nav-link <?=($this->uri->segment(2) == 'laporan_siswa') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Siswa</p>
                </a>
              </li>
            </ul>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>