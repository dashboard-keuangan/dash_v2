<div class="card card-<?=($this->uri->segment(3) == '1') ? 'warning' : 'primary'; ?> card-outline">
  <div class="card-header"><h3 class="card-title">Saldo <?= $sekolah ?></h3></div>
</div>
<div class="row">
  <div class="col">
    <div class="small-box bg-<?=($this->uri->segment(3) == '1') ? 'warning' : 'primary'; ?>">
      <div class="inner">
        <h3>Rp. <?php if (!$tot_biaya) { echo "0"; } else { echo number_format("$tot_biaya",2,",","."); } ?></h3>
        <p>Total Pemasukan</p>
      </div>
      <div class="icon">
        <i class="ion ion-archive"></i>
      </div>
      <a href="javascript:void(0)" class="small-box-footer">Lihat rincian <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-md-3">
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
        <h2><?= $tot_siswa ?> Siswa</h2>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.info card -->
