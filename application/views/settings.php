<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Settings :: DashKeu</title>

  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/dist/img/favicon.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
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
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- ALERT start -->
        <?php if ($this->session->userdata('ubahpass_gagal')) {?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Failed!</h5>
            Update password gagal! Value tidak sama.
          </div>
        <?php } ?>
        <!-- ALERT end -->
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header no-border">
                <h3 class="card-title">Change Password</h3>
              </div>
              <div class="card-body">
                <form class="form-horizontal form-material" role="form" method="POST">
                  <div class="form-group">
                    <label class="col-md-12">New Password</label>
                    <div class="col-md-12">
                      <input type="password" class="form-control form-control-line" name="password0" id="password0" placeholder="Enter New Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Retype New Password</label>
                    <div class="col-md-12">
                      <input type="password" class="form-control form-control-line" name="password" id="username" placeholder="Retype New Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button class="btn btn-warning" type="submit" name="submit1">Change Password</button>
                      <a class="btn btn-danger" onclick="goBack()" href="javascript:void(0)">Batal</a>
                    </div>
                  </div>
                </form>
                <!-- /form -->
                * Nilai kosong tidak akan mengubah password
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Change Security</h3>
              </div>
              <div class="card-body">
                <form class="form-horizontal form-material" role="form" method="POST">
                  <?php foreach ($profil as $row) { ?>
                    <div class="form-group">
                      <label class="col-md-12">Pertanyaan Keamanan</label>
                      <div class="col-md-12">
                        <select class="custom-select" id="pertanyaan" name="pertanyaan">
                          <option selected><?=$row->pertanyaan;?></option>
                          <option value="Apa warna kesukaan anda ?">Apa warna kesukaan anda ?</option>
                          <option value="Dimanakah ibu anda dilahirkan ?">Dimanakah ibu anda dilahirkan ?</option>
                          <option value="Apa nama hewan peliharaan anda ?">Apa nama hewan peliharaan anda ?</option>
                          <option value="Siapa nama teman kecil anda ?">Siapa nama teman kecil anda ?</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-12">Jawaban</label>
                      <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" name="jawaban" id="jawaban" value="<?=$row->jawaban;?>">
                      </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-12">
                      <button class="btn btn-success" type="submit" name="submit2">Change security</button>
                      <a class="btn btn-danger" onclick="goBack()" href="javascript:void(0)">Batal</a>
                    </div>
                  </div>
                  <?php } ?>
                </form>
                <!-- /form -->
              </div>
              <!-- /.card-body -->
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