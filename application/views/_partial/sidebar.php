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
          <li class="nav-item has-treeview <?=($this->uri->segment(2) == 'pemasukan' || $this->uri->segment(2) == 'pengeluaran' || $this->uri->segment(2) == 'rekapitulasi') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?=($this->uri->segment(2) == 'pemasukan' || $this->uri->segment(2) == 'pengeluaran' || $this->uri->segment(2) == 'rekapitulasi') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Keuangan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('pages/pemasukan')?>" class="nav-link <?=($this->uri->segment(2) == 'pemasukan') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemasukan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('home/laporan_siswa')?>" class="nav-link <?=($this->uri->segment(2) == 'pengeluaran') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Siswa</p>
                </a>
              </li>
          <li class="nav-header">TEAMS</li>
          <li class="nav-item">
            <a href="<?=base_url('pages/team');?>" class="nav-link <?=($this->uri->segment(2) == 'team') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Teams
                <span class="badge badge-info right">5</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>