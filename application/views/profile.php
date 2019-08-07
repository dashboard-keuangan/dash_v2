<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profile :: DashKeu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/dist/img/favicon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/sweetalert2/sweetalert2.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/additional.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?=base_url();?>assets/dist/img/avatar5.png"
                       alt="User profile picture">
                </div>
                <?php foreach ($profil as $row) { ?>
                <h3 class="profile-username text-center"><?=$row->nama;?></h3>

                <p class="text-muted text-center">Employee</p>

                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  <?=$row->education;?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"><?=$row->alamat;?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <?=$row->skill;?>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted"><?=$row->notes;?></p>
                <?php } ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="profile">
                    <!-- The timeline -->
                    <?php foreach ($profil as $row) { ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                <br>
                                <p class="text-muted"><?=$row->nama; ?></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                <br>
                                <p class="text-muted"><?=$row->no_telp; ?></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                <br>
                                <p class="text-muted"><?=$row->email; ?></p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                <br>
                                <p class="text-muted"><?=$row->alamat; ?></p>
                            </div>
                        </div>
                        <div class="post clearfix"></div>
                        <h4 class="font-medium m-t-30">Bio</h4>
                        <p class="m-t-30"><?=$row->bio; ?></p>
                        <div class="post clearfix"></div>
                        <h4 class="font-medium m-t-30">Pertanyaan Keamanan</h4>
                        <p class="m-t-30"><?=$row->pertanyaan; ?></p>
                        <input type="text" class="form-control form-control-line" value="<?=$row->jawaban; ?>" name="education" disabled>
                        <div class="post clearfix"></div>
                    </div>
                    <?php } ?>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <?php foreach ($profil as $row) { ?>
                    <div class="card-body">
                        <form class="form-horizontal form-material" action="<?=base_url('pages/act_update_prof')?>" method="POST">
                            <div class="form-group">
                                <label class="col-md-12">ID</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="id" id="id" value="<?=$row->id; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Username</label>
                                <div class="input-group col-md-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                  </div>
                                    <input type="text" class="form-control form-control-line" name="username" id="username" value="<?=$row->username; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-12">Full Name</label>
                                <div class="input-group col-md-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                    <input type="text" class="form-control form-control-line" name="nama" id="nama" value="<?=$row->nama; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-12">Email</label>
                                <div class="input-group col-md-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                  </div>
                                    <input type="email" class="form-control form-control-line" name="email" id="email" value="<?=$row->email; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Jenis Kelamin</label>
                                <div class="input-group col-sm-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                  </div>
                                    <select class="form-control form-control-line" name="jenis_kelamin">
                                        <option value="L" <?php if ($row->jenis_kelamin=="L") { echo "selected='yes'"; } ?>>L</option>
                                        <option value="P" <?php if ($row->jenis_kelamin=="P") { echo "selected='yes'"; } ?>>P</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="input-group col-md-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                  </div>
                                    <input type="text" class="form-control form-control-line" value="<?=$row->no_telp; ?>" name="no_telp">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Domisili</label>
                                <div class="input-group col-md-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                                  </div>
                                    <input type="text" class="form-control form-control-line" value="<?=$row->alamat; ?>" name="alamat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Pendidikan Terakhir</label>
                                <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" value="<?=$row->education; ?>" name="education">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Skills</label>
                                <div class="col-md-12">
                                    <textarea rows="3" class="form-control form-control-line" name="skill"><?=$row->skill; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Bio</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line" name="bio"><?=$row->bio; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Notes</label>
                                <div class="col-md-12">
                                    <textarea rows="3" class="form-control form-control-line" name="notes"><?=$row->notes; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit">Update Profile</button>
                                    <a class="btn btn-danger" href="<?=base_url()?>">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
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