<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Laporan Harian :: DashKeu</title>

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
            <h1 class="m-0 text-dark">Laporan Harian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Laporan Harian</li>
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
                <h3 class="card-title">Laporan Harian</h3>
              </div>
              <div class="card-body">                
                <?php
                    /* Mengambil query report*/
                    foreach($report as $result){
                        $tanggal[] = $result->tanggal; //ambil bulan
                        $saldo[] = (float) $result->saldo; //ambil nilai
                    }
                    /* end mengambil query*/
                    
                ?>
                
                <!-- Load chart dengan menggunakan ID -->
                <div id="report"></div>
                <!-- END load chart -->
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Total Pemasukan</th>
                        <th>Total Pengeluaran</th>
                        <th>Saldo</th>
                        <th>Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $num=1; $total=0; ?>
                      <?php foreach ($report as $row) { ?>
                      <tr>
                        <td><?=$num++?></td>
                        <td><?php $date = str_replace('/', '-', $row->tanggal ); $newDate = date("d-m-Y", strtotime($date)); echo $newDate?></td>
                         <?php $ttt = $row->tanggal;?>
                        <td><?=$row->total_pemasukan;?></td>
                        <td><?=$row->total_pengeluaran;?></td>
                        <td><?="Rp. ".number_format($row->saldo).",-";?></td>
                        <td class="text-center"><button id="<?=$ttt?>" onClick="delebabi('<?=$row->tanggal;?>')" class="btn btn-success"><i class="fas fa-info-circle"></button></i></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">Pemasukan Tanggal : <span  id="asup"></div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="latihan" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>No Kwitansi</th>
                        <th>Customer</th>
                        <th>Biaya</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody id='babi'>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-header">Pengeluaran Tanggal : <span  id="kaluar"></div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="latihan" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>No Kwitansi</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody id='bagong'>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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

<!-- OPTIONAL SCRIPTS -->
<script src="<?=base_url()?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- load library jquery dan highcharts -->
<script src="<?php echo base_url();?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/highcharts.js"></script>
<!-- end load library -->
<!-- Script untuk memanggil library Highcharts -->
<script type="text/javascript">
$(function () {
    $('#report').highcharts({
        chart: {
            type: 'column',
            margin: 75,
            options3d: {
                enabled: false,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Report 7 Hari Kebelakang',
            style: {
                    fontSize: '18px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        subtitle: {
           text: 'Penghasilan',
           style: {
                    fontSize: '15px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories:  <?php echo json_encode($tanggal);?>
        },
        exporting: { 
            enabled: false 
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
        },
        tooltip: {
             formatter: function() {
                 return 'The value for <b>' + this.x + '</b> is <b>' + Highcharts.numberFormat(this.y,0) + '</b>, in '+ this.series.name;
             }
          },
        series: [{
            name: 'Report Data',
            data: <?php echo json_encode($saldo);?>,
            shadow : true,
            dataLabels: {
                enabled: true,
                color: '#045396',
                align: 'center',
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});
function delebabi(status){
        var www = <?=$ttt?>;
        
        $.ajax({
          type:'POST',
          url:'<?=base_url()?>pages/detailharian_keluar/'+status,
          dataType: 'json',
          success: function(data){
            console.log(data);
          var baris = '';
          for (var  i=0;i<data.length;i++){
            baris += '<tr>'+
                            '<td>'+data[i].id+'</td>'+
                            '<td>'+data[i].no_kwitansi+'</td>'+
                            '<td>'+data[i].harga_satuan+'</td>'+
                            '<td>'+data[i].jumlah+'</td>'+
                            '<td>'+data[i].keterangan+'</td>'+
                      '</tr>';
          }
          $('#bagong').html(baris);
          
          }
        });
        document.getElementById("kaluar").innerHTML = status;
        document.getElementById("asup").innerHTML = status;
        $.ajax({
          type:'POST',
          url:'<?=base_url()?>pages/detailharian_masuk/'+status,
          dataType: 'json',
          success: function(data){
          var baris = '';
          for (var  i=0;i<data.length;i++){
            baris += '<tr>'+
                            '<td>'+data[i].id+'</td>'+
                            '<td>'+data[i].no_kwitansi+'</td>'+
                            '<td>'+data[i].customer+'</td>'+
                            '<td>'+data[i].biaya+'</td>'+
                            '<td>'+data[i].keterangan+'</td>'+
                      '</tr>';
          }
          $('#babi').html(baris);
          
          }
        });
    }
</script>


</body>
</html>