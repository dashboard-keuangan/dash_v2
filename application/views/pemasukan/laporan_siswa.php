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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">

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
        <div class="row">
          <div class="col-3">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">NIS</label>
              </div>
              <form>
                <input type="text" class="form-control form-control-line" id="nis" placeholder="NIS" onkeyup="myFunction()">
              </form>   
            </div>
          </div>
          <div class="col-4">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Sekolah</label>
              </div>
                 <form>
                <input type="text" style="width: 300px;" class="form-control form-control-line" id="sekolah" placeholder="Sekolah" disabled>
              </form>
            </div>
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-3">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Tingkat</label>
              </div>
              <form>
                <select class="custom-select" id="pilih_tingkat" name='pilih_tingkat' style="width: 200px;">
                  <option value="0">Tingkat</option>
                </select>
              </form>   
            </div>
          </div>
          <div class="col-2">
            <div class="input-group mb-3">
              <div class="input-group">
                  <button type="button" class="btn btn-primary" onclick="gogo()">Submit</button>
            </div>
          </div>
        </div>
          <!-- /.col -->
        </div>
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
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col" id="printed">
            <div class="card">
              <div class="card-header">Histori Pembayaran</div>
              <div class="card-body">
                <div class="table-responsive" id="test">
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php $this->load->view('_partial/footer');?>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script type="text/javascript">
  <?php foreach ($sekolah as $yuhu) { ?>
  $('#btnsekolah-<?=$yuhu->id_sekolah?>').click(function(){
    $.ajax({
        type: "GET",
        url: "<?php echo base_url().'home/'. $yuhu->Sekolah ?>",
        dataType: 'json',
          success: function(data){

          }
    });

  });
  <?php } ?>
</script>
<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("nis").value;
  console.log(x);
  $.ajax({
          type:'POST',
          url:'<?=base_url()?>home/show_tingkat/'+x,
          dataType: 'json',
          success: function(data){
          var baris = '';
          var sekolah = data[0].nama_sekolah;
          for (var  i=0;i<data.length;i++){
            baris += "<option value='"+data[i].id_tingkat+"'>"+data[i].Tingkat+"</option>"
          }
          $('#pilih_tingkat').html(baris);
          document.getElementById("sekolah").value = sekolah;

          
          }
        });
}
function gogo(){
  var x = document.getElementById("nis").value;
  var y = document.getElementById("pilih_tingkat").value;
     console.log(x);
     console.log(y);
     $.ajax({
            type: "GET",
            url: '<?php echo base_url() ?>home/printkan/'+x+'/'+y,
            data: { },
            success: function(data){
                $('#test').html(data);
            }
        }); 
}
</script>

</body>
</html>