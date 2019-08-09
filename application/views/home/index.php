<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Home :: DashKeu</title>

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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" onload="loadHome()">
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
        <div class="input-group">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Pilih Sekolah</label>
          </div>
          <form>
            <select class="custom-select" id="pilih_sekolah" name='pilih_sekolah'>
              <option value="0">Tampilkan Semua</option>
              <?php foreach ($sekolah as $s) { if ($s->id_sekolah !== '6') { ?>
              <option value='<?=$s->id_sekolah ?>'><?=$s->nama_sekolah ?></option>
              <?php } }?>
            </select>
          </form>
        </div>
        <!-- /.option -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <hr />
            <div id="content"></div>

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
  <script src="<?=base_url()?>assets/plugins/chart.js/Chart.min.js"></script>

<script type="text/javascript">
  function loadHome() {
    $('#content').load("<?php echo base_url().'home/yayasan' ?>");
  }

  $(function(){$('#pilih_sekolah').change(function(){
      var id_sekolah = $(this).val();
      console.log(id_sekolah);
      if (id_sekolah == 0){
        loadHome();
      } else{
        $.ajax({
          type: "GET",
          url: '<?php echo base_url() ?>home/sekolah/'+id_sekolah,
          data: { },
          success: function(data){
            console.log(data);
            $('#content').html(data);
          }
        });
      }
    })

  });
</script>
</body>
</html>