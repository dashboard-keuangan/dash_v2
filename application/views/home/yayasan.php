<div class="card card-primary card-outline text-center">
  <div class="card-header"><h3 class="card-title">Saldo <?=$nama_yayasan?></h3></div>
</div>
<div class="row">
  <div class="col-md-12">
  <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>Rp. <?php if (!$tot_yayasan) { echo "0"; } else { echo number_format("$tot_yayasan",2,",","."); } ?></h3>
        <p>Total Pemasukan</p>
      </div>
      <div class="icon">
        <i class="ion ion-archive"></i>
      </div>
      <a href="<?=base_url('pages/pemasukan')?>" class="small-box-footer">Lihat rincian <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-md-6 col-sm-12">
  <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>Rp. <?php if (!$tot_smp) { echo "0"; } else { echo number_format("$tot_smp",2,",","."); } ?></h3>
        <p><?=$nama_smp?></p>
      </div>
      <div class="icon">
        <i class="ion ion-archive"></i>
      </div>
      <a href="<?=base_url('pages/pemasukan')?>" class="small-box-footer">Lihat rincian <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-md-6 col-sm-12">
  <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>Rp. <?php if (!$tot_sma) { echo "0"; } else { echo number_format("$tot_sma",2,",","."); } ?></h3>
        <p><?=$nama_sma?></p>
      </div>
      <div class="icon">
        <i class="ion ion-archive"></i>
      </div>
      <a href="<?=base_url('pages/pemasukan')?>" class="small-box-footer">Lihat rincian <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-md-12">
  <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>Rp. <?php if (!$tot_smk) { echo "0"; } else { echo number_format("$tot_smk",2,",","."); } ?></h3>
        <p><?=$nama_smk?></p>
      </div>
      <div class="icon">
        <i class="ion ion-archive"></i>
      </div>
      <a href="<?=base_url('pages/pemasukan')?>" class="small-box-footer">Lihat rincian <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
<!-- /.info card -->

<div class="card card-primary card-outline text-center">
  <div class="card-header"><h3 class="card-title">SISWA</h3></div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><?=$nama_smp?></h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <h2><?= $siswa_smp ?> Siswa</h2>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <div class="col-md-4">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"><?=$nama_sma?></h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <h2><?= $siswa_sma ?> Siswa</h2>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <div class="col-md-4">
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title"><?=$nama_smk?></h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <h2><?= $siswa_smk ?> Siswa</h2>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <div class="col-md-12 text-center">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Total Siswa</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <h2><?= $siswa_smp+$siswa_sma+$siswa_smk ?> Siswa</h2>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-12">
    <!-- PIE CHART -->
    <div class="card card-secondary">
      <div class="card-header text-center">
        <h3 class="card-title">Chart Total</h3>
      </div>
      <div class="card-body">
        <canvas id="pieChart" style="height:230px"></canvas>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <div class="col-lg-6 col-12">
    <!-- BAR CHART -->
    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">Bar Chart</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="barChart" style="height:230px"></canvas>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

</div>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          '<?=$nama_smp?>', 
          '<?=$nama_sma?>',
          '<?=$nama_smk?>',
      ],
      datasets: [
        {
          data: [<?=$tot_smp?>,<?=$tot_sma?>,<?=$tot_smk?>],
          backgroundColor : ['#ffc107','#00c0ef', '#f56954'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = {
      labels  : ['Total Siswa'],
      datasets: [
        {
          label               : '<?=$nama_smp?>',
          backgroundColor     : '#ffc107',
          borderColor         : '#ffc107',
          pointRadius          : false,
          pointColor          : '#ffc107',
          pointStrokeColor    : '#ffc107',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?=$siswa_smp ?>]
        },
        {
          label               : '<?=$nama_sma?>',
          backgroundColor     : '#00c0ef',
          borderColor         : '#00c0ef',
          pointRadius         : false,
          pointColor          : '#00c0ef',
          pointStrokeColor    : '#00c0ef',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?=$siswa_sma ?>]
        },
        {
          label               : '<?=$nama_smk?>',
          backgroundColor     : '#f56954',
          borderColor         : '#f56954',
          pointRadius         : false,
          pointColor          : '#f56954',
          pointStrokeColor    : '#f56954',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?=$siswa_smk ?>]
        },
      ]
    }
    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

  })
</script>
