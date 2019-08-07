<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Pemasukan :: DashKeu</title>

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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">
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
            <h1 class="m-0 text-dark">Pemasukan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Pemasukan</li>
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
            <!-- Start ALERT -->
            <!-- ============================================================== -->
            <?php if ($this->session->userdata('add_pem_ok')) {?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Tambah Data Pemasukan berhasil!
              </div>
            <?php } ?>
            <?php if ($this->session->userdata('delete_ok')) {?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Hapus Data Pemasukan berhasil!
              </div>
            <?php } ?>
            <?php if ($this->session->userdata('update_ok')) {?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Update Data Pemasukan berhasil!
              </div>
            <?php } ?>
            <!-- ============================================================== -->
            <!-- End ALERT -->
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title p-1">Data Pemasukan</h3>
                  <span title="Tambah Data"><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-default">Tambah Data Pemasukan</button></span>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>No Kwitansi</th>
                        <th>Customer</th>
                        <th>Keterangan</th>
                        <th>Biaya</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $num=1 ?>
                      <?php foreach ($pemasukan as $row) { ?>
                      <tr>
                        <td><?=$num++?></td>
                        <td><?=$row->tanggal?></td>
                        <td><?=$row->no_kwitansi?></td>
                        <td><?=$row->customer?></td>
                        <td><?=$row->keterangan?></td>
                        <td><?="Rp. ".number_format($row->biaya).",-";?></td>
                        <td class="text-center"><a class="btn btn-sm btn-warning" href="<?=base_url('pages/edit_data_masuk')?>/<?=$row->id;?>"><i class="fas fa-pencil-alt"></i></a> <a href="javascript:void(0)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_konfirmasi_hapus" data-id="<?=$row->id ?>"><i class="fas fa-trash-alt"></i></a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tr>
                      <td colspan="5" class="text-center text-bold">Total Pemasukan :</td>
                      <td colspan="2" class="text-bold"><font style="color: green;"><?php echo "Rp. " . number_format($total).",-"; ?></font></td>
                    </tr>
                  </table>
                </div>
                <!-- /.table-responsive -->
                
                <div class="modal fade" id="modal-default">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Pemasukan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post">
                          <div class="form-group">
                            <label>No Kwitansi</label>
                            <input class="form-control" name="no_kwitansi" placeholder="No Kwitansi" />
                          </div>
                          <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tanggal">
                          </div>
                          <div class="form-group">
                            <label>Customer</label>
                            <input class="form-control" name="customer" placeholder="Customer" />
                          </div>
                          <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                          </div>
                          <div class="form-group">
                            <label>Biaya</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                              </div>
                              <input type="text" class="form-control" name="biaya" />
                            </div>
                            <!-- /.input group -->
                          </div>
                      </div>
                      <!-- /.modal-body -->
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- MODAL:: konfirmasi hapus -->
                <div class="modal fade" id="modal_konfirmasi_hapus">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Hapus Data #<span class="detail font-bold"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah Anda yakin akan menghapus data ini?</p>
                      </div>
                      <div class="modal-footer">
                        <a href="#" class="btn btn-danger modal-action">Ya</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- / modal konfirmasi hapus -->
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
  
<!-- DataTables -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#modal_konfirmasi_hapus').on('show.bs.modal', function (e) {
      var btn = $(e.relatedTarget);

      var modal = $(this);
      modal.find('.modal-title span.detail').text(`${btn.data('nama')}`);
      modal.find('.modal-action').attr('href', `<?=base_url()?>pages/delete_masuk/${btn.data('id')}`);
    });
  })
</script>

</body>
</html>