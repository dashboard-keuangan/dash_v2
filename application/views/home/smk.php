<div class="card card-danger card-outline">
  <div class="card-header"><h3 class="card-title">Saldo <?= $sekolah ?></h3></div>
</div>
<div class="row">
  <div class="col">
  <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>Rp. <?php if (!$tot_biaya) { echo "0"; } else { echo number_format("$tot_biaya",2,",","."); } ?></h3>
        <p>Total Pemasukan</p>
      </div>
      <div class="icon">
        <i class="ion ion-archive"></i>
      </div>
      <a href="<?=base_url('pages/pemasukan')?>" class="small-box-footer">Lihat rincian <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
<!-- /.info card -->
