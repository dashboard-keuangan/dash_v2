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
  <style>
  .intro {
    font-size: 150%;
    color: red;
  }
  </style>
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
        <div class="dropdown text-center">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
            -- Pilih Sekolah --
          </button>
          <div class="dropdown-menu">
            <?php foreach($sekolah as $s) { ?>
            <a class="dropdown-item" id="btnsekolah-<?=$s->id_sekolah?>" href="javascript:void(0)"><?=$s->nama_sekolah?></a>
            <?php } ?>
          </div>
        </div>
        <!-- /.dropdown -->
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
  //$("#buttonsmp").click(function() {
  //  $('#content').load("<?php echo base_url().'home/smp' ?>");
  //  $("#buttonsmp").addClass("active");
  //  $("#buttonsmk").removeClass("active");
  //})

  // load data
  <?php foreach ($sekolah as $yuhu) { ?>
  $('#btnsekolah-<?=$yuhu->id_sekolah?>').click(function(){
    $.ajax({
        type: "GET",
        url: "<?php echo base_url().'home/'. $yuhu->Sekolah ?>",
        data: { },
        success: function(data){
            $('#content').html(data);
        }
    });

  });
  <?php } ?>
</script>

</body>
</html>