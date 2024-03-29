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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" onload="loadPemasukan()">
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
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title p-1">Data Pemasukan</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Pilih Sekolah</label>
                    </div>
                    <form>
                      <select class="custom-select" id="pilih_sekolah" name='pilih_sekolah'>
                        <option value="0">Tampilkan semua</option>
                        <?php foreach ($pilih_sekolah as $row) { ?>
                        <?php if($row->id_sekolah !== '6') { ?>
                        <option value='<?=$row->id_sekolah ?>'><?=$row->nama_sekolah ?></option>
                        <?php } } ?>
                      </select>
                    </form>
                  </div>
                </div>
                <div id="content" class="card-body">
                         
                </div>
               
                <!-- /.table-responsive -->
                

                <!-- /.modal -->

                <!-- / modal konfirmasi hapus -->
              </div>
              <div class="card-body">
                <div class="table-responsive">
                 
                
                <div id="gas" class="card-body">
                         
                </div>
               </div>
               <div class="card-body">
                <div class="table-responsive">
                 
                
                <div id="gaspartii" class="card-body">
                         
                </div>
               </div>
             </div>
                <!-- /.table-responsive -->
                

                <!-- /.modal -->

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
<script>
    function loadPemasukan() {
    $('#content').load("<?php echo base_url().'home/show_data' ?>");
  }
  $(function(){$('#pilih_sekolah').change(function(){
      var id_sekolah = $(this).val();
      console.log(id_sekolah);
      if (id_sekolah == 0){
        loadPemasukan();
      } else{
        $.ajax({
            type: "GET",
            url: '<?php echo base_url() ?>home/show_data_by_id/'+id_sekolah,
            data: { },
            success: function(data){
              console.log(data);
                $('#content').html(data);
            }
        });        
      }
     
    })
     
    function loadPemasukan() {
    $('#content').load("<?php echo base_url().'home/show_data' ?>");
  }
  });
  function detail(id){
        $.ajax({
            type: "GET",
            url: '<?php echo base_url() ?>home/semi_detail/'+id,
            data: { },
            success: function(data){
                $('#gas').html(data);
                $('#gaspartii').empty();
            }
        }); 
        
       
    }
     function detail_pembayaran(id,tingkat){
        var baru = id+"/"+tingkat;
      $.ajax({
        
        url: "<?php echo base_url() ?>home/detailii/"+id+'/'+tingkat,
        type: "GET",
        data:{ },
        error: function() {
              console.log(data);
              alert('Something is wrong');
           },
        success: function(data){
          $('#gaspartii').html(data);
        }
      })
    }
</script>

</body>
</html>