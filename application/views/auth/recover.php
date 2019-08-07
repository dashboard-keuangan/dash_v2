<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recover Password :: DashKeu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/dist/img/favicon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url();?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>/assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url();?>"><b>Dash</b>Keu</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masukan ID dan Pertanyaan Keamanan</p>
      <!-- Alert START -->
      <?php if ($this->session->userdata('recover_fail')) {?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-ban"></i> Failed!</h5>
          Username / Pertanyaan Keamanan Salah!.
        </div>
      <?php } ?>
      <!-- Alert END -->
      <form role="form" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="username" id="username" class="form-control" placeholder="Username">
          <div class="input-group-append input-group-text">
              <span class="far fa-user"></span>
          </div>
        </div>
        <div class="input-group mb-3">
            <select class="custom-select" id="pertanyaan" name="pertanyaan">
                <option selected>Pilih Pertanyaan</option>
                <option value="Apa warna kesukaan anda ?">Apa warna kesukaan anda ?</option>
                <option value="Dimanakah ibu anda dilahirkan ?">Dimanakah ibu anda dilahirkan ?</option>
                <option value="Apa nama hewan peliharaan anda ?">Apa nama hewan peliharaan anda ?</option>
                <option value="Siapa nama teman kecil anda ?">Siapa nama teman kecil anda ?</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control form-control-line" name="jawaban" id="jawaban" placeholder="Masukkan Jawaban">
            <div class="input-group-append input-group-text">
              <span class="fas fa-signature"></span>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4 offset-md-8">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Process</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a href="<?=base_url('auth')?>">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
$(".toggle-password").click(function() {

$(this).toggleClass("fa-eye-slash fa-eye");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
</script>
</body>
</html>