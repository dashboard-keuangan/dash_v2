<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Pencarian :: DashKeu</title>

  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/dist/img/favicon.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/additional.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php $this->load->view('_partial/navbar');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $this->load->view('_partial/sidebar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pencarian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Pencarian</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pencarian</h3>
              </div>
              <div class="card-body">
                <form role="form" method="GET">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <select type="button" class="btn btn-block btn-default" name="kategori">
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                      </select>
                    </div>
                    <input type="search" class="form-control" name="q" placeholder="Search ...">
                    <div class="input-group-append">
                      <button class="input-group-text" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                  <!-- /input-group -->
                </form>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No Kwitansi</th>
                    <th>Keterangan</th>
                    <?php if ($this->input->get('kategori') == 'pemasukan') { ?>
                    <th>Biaya</th>
                    <?php } else { ?>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <?php } ?>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php if ($this->input->get('q')=='') { $this->session->set_flashdata('error_search', 'Failed! Value kosong.'); redirect('error404', 'location'); } else { ?>
                <h2><?=ucwords($this->input->get('kategori'))?></h2>
                <?php if ($this->input->get()) { foreach($results as $row){ ?>
                  <?php if ($this->input->get('kategori')=='pemasukan') { ?>
                    <tr>
                      <td><?=$row->no_kwitansi?></td>
                      <td><?=$row->keterangan?></td>
                      <td><?="Rp. ".number_format($row->biaya).",-"?></td>
                      <td class="text-center"><a class="btn btn-sm btn-warning" href="<?=base_url('pages/edit_data_masuk')?>/<?=$row->id;?>"><i class="fas fa-pencil-alt"></i></a></td>
                    </tr>
                  <?php } else { ?>
                    <tr>
                      <td><?=$row->no_kwitansi?></td>
                      <td><?=$row->keterangan?></td>
                      <td><?="Rp. ".number_format($row->harga_satuan).",-"?></td>
                      <td><?=$row->jumlah?></td>
                      <td class="text-center"><a class="btn btn-sm btn-warning" href="<?=base_url('pages/edit_data_masuk')?>/<?=$row->id;?>"><i class="fas fa-pencil-alt"></i></a></td>
                    </tr>
                  <?php } ?>
                <?php } } ?>
                <?php } ?>
                </tfoot>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php $this->load->view('_partial/footer');?>

</body>
</html>