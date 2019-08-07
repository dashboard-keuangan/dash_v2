<div class="card card-primary card-outline">
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

<!-- Main row -->
<div class="row">
  <div class="col-lg-6 col-12">
    <!-- PIE CHART -->
    <div class="card card-success">
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
  })
</script>