<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Rekapitulasi :: DashKeu</title>

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
            <h1 class="m-0 text-dark">Rekapitulasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Rekapitulasi</li>
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
                <div class="d-flex justify-content-between">
                  <h3 class="card-title p-1">Rekapitulasi</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="col-sm-12">
                  <div class="white-box">
                    <form role="form" method="POST">
                      <div class="row">
                      <div class="input-group">
                        <div class="col-sm input-group-prepend">
                          <select class="btn btn-block btn-default" name="kategori">
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                          </select>
                          <input type="date" name="tanggal_awal" class="form-control form-control-line">
                        </div>
                        <div class="col-sm-0 text-center">
                          <span>s/d</span>
                        </div>
                        <div class="col-sm">
                          <input type="date" name="tanggal_akhir" class="form-control form-control-line"> 
                        </div>
                        <div class="col-sm-0">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                      </div>
                      <!-- /.row -->
                    </form>
                    <!-- /form -->
                    <br>
                    <div id="printed">
                      <?php if ($this->input->post('kategori') == 'pemasukan') { ?>
                      <h4>Laporan <?=ucwords($this->input->post('kategori'));?> tanggal <?=$this->input->post('tanggal_awal')?> s/d <?=$this->input->post('tanggal_akhir')?></h4>
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>No Kwitansi</th>  
                              <th>Tanggal</th>
                              <th>Keterangan</th>
                              <th>Biaya</th>              
                            </tr>
                          </thead>
                          <tbody>
                          <?php $no=1; $total=0; ?>
                          <?php foreach ($rekap as $row) { ?>
                          <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['no_kwitansi'];?></td>
                            <td><?=$row['tanggal'];?></td>
                            <td><?=$row['keterangan'];?></td>
                            <td><?="Rp. ".number_format($row['biaya']).",-";?></td>
                          </tr>
                          <?php $total=$total+($row['biaya']); }?>
                          </tbody>
                          <tr><th></th><th></th><th></th><th>Total Dana</th><th><b><?="Rp. ".number_format($total).",-";?></b></th></tr>                     
                        </table>
                      </div>
                      <!-- /.table-responsive -->
                      <?php } elseif ($this->input->post('kategori') == 'pengeluaran') { ?>
                      <h4>Laporan <?=ucwords($this->input->post('kategori'));?> tanggal <?=$this->input->post('tanggal_awal')?> s/d <?=$this->input->post('tanggal_akhir')?></h4>
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>No Kwitansi</th>  
                              <th>Tanggal</th>
                              <th>Keterangan</th>
                              <th>Harga Satuan</th>
                              <th>Jumlah</th>               
                            </tr>
                          </thead>
                          <tbody>
                          <?php $no=1; $total=0; ?>
                          <?php foreach ($rekap as $row) { ?>
                          <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['no_kwitansi'];?></td>
                            <td><?=$row['tanggal'];?></td>
                            <td><?=$row['keterangan'];?></td>
                            <td><?="Rp. ".number_format($row['harga_satuan']).",-";?></td>
                            <td><?=$row['jumlah'];?></td>
                          </tr>
                          <?php $total=$total+($row['harga_satuan']*$row['jumlah']); }?>
                          </tbody>
                          <tr><th></th><th></th><th></th><th></th><th>Total Dana</th><th><b><?="Rp. ".number_format($total).",-";?></b></th></tr>                     
                        </table>
                      </div>
                      <?php } ?>
                      <!-- /.table-responsive -->
                    </div>
                    <!-- /#printed -->
                  </div>
                  <!-- /.white-box -->
                  <?php if ($this->input->post('tanggal_awal') && $this->input->post('tanggal_akhir')) { ?>
                  <div class="row">
                    <div class="col-sm-12">
                    <button type="button" class="btn btn-success" onclick="print()">Print PDF</button>
                    </div>
                  </div>
                  <!-- row -->
                  <?php } ?>
                </div>
                <!-- /.col -->
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
  <script type="text/javascript" src="<?=base_url();?>assets/plugins/table_export/libs/FileSaver/FileSaver.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/plugins/table_export/libs/jsPDF/jspdf.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/plugins/table_export/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>

<script>
  function print() {
     var pdf = new jsPDF('p', 'pt', 'letter');
      source = $('#printed')[0];
      specialElementHandlers = {
          '#bypassme': function (element, renderer) {
              return true
          }
      };
      margins = {
          top: 40,
          bottom: 40,
          left: 80,
          width: 700
      };
      // all coords and widths are in jsPDF instance's declared units
      // 'inches' in this case
      pdf.fromHTML(
      source, // HTML string or DOM elem ref.
      margins.left, // x coord
      margins.top, { // y coord
          'width': margins.width, // max width of content on PDF
          'elementHandlers': specialElementHandlers
      },
  
      function (dispose) {
          pdf.save('Laporan-<?=ucwords($this->input->post('kategori'));?>(<?=date('Ymd', strtotime($this->input->post('tanggal_awal')))."-".date('Ymd', strtotime($this->input->post('tanggal_akhir')));?>).pdf');
      }, margins);
  }	
</script>
</body>
</html>