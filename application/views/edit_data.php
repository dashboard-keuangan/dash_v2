<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Edit Data :: DashKeu</title>

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
            <h1 class="m-0 text-dark">Edit Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Blank</li>
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
                <h3 class="card-title">Edit Data</h3>
              </div>
              <div class="card-body">
                <form class="form-horizontal form-material" method="POST">
                <?php foreach ($edit as $row) { ?>
                  <div class="form-group">
                    <label class="col-md-12">No Kwitansi</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="no_kwitansi" value="<?=$row['no_kwitansi'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Tanggal</label>
                    <div class="col-md-12">
                      <input type="date" class="form-control form-control-line" name="tanggal" value="<?=$row['tanggal'];?>">
                    </div>
                  </div>
                  <?php if ($this->uri->segment(2) == 'edit_data_masuk') { ?>
                  <div class="form-group">
                  <label class="col-md-12">Customer</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control form-control-line" name="customer" value="<?=$row['customer'];?>">
                  </div>
                  </div>
                  <?php } ?>
                  <div class="form-group">
                    <label class="col-md-12">Keterangan</label>
                    <div class="col-md-12">
                      <textarea row="3" class="form-control form-control-line" name="keterangan"><?=$row['keterangan'];?></textarea>
                    </div>
                  </div>
                  <?php if ($this->uri->segment(2) == 'edit_data_keluar') { ?>
                  <div class="form-group">
                    <label class="col-md-12">Harga Satuan</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="harga_satuan" value="<?=$row['harga_satuan'];?>">
                    </div>
                  </div>
                  <?php } ?>
                  <?php if ($this->uri->segment(2) == 'edit_data_keluar') { ?>
                  <div class="form-group">
                    <label class="col-md-12">Jumlah</label>
                    <div class="col-md-12">
                      <input type="number" class="form-control form-control-line" name="jumlah" value="<?=$row['jumlah'];?>">
                    </div>
                  </div>
                  <?php } else { ?>
                  <div class="form-group">
                    <label class="col-md-12">Biaya</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="biaya" value="<?=$row['biaya'];?>">
                    </div>
                  </div>
                  <?php } ?>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button class="btn btn-warning" type="submit">Submit</button>
                    </div>
                  </div>
                <?php } ?>
                </form>
                <!-- /form -->
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