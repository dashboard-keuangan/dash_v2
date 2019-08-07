<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register :: DashKeu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/dist/img/favicon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?=base_url()?>"><b>Dash</b>Keu</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      <!-- Alert START -->
      <?php if ($this->session->userdata('register_fail')) {?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-ban"></i> Failed!</h5>
          Register gagal! Username telah ada.
        </div>
      <?php } ?>
      <?php if ($this->session->userdata('register_fail_p')) {?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-ban"></i> Failed!</h5>
          Register gagal! Password tidak sama.
        </div>
      <?php } ?>
      <!-- Alert END -->
      <form action="<?=base_url('auth/act_register')?>" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append input-group-text">
              <span class="far fa-user"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="nama" class="form-control" placeholder="Full Name" required>
          <div class="input-group-append input-group-text">
              <span class="fas fa-signature"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append input-group-text">
          <span toggle="#password-field" class="far fa-eye-slash toggle-password" title="Show/hide password"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password-field-v" type="password" name="password-v" class="form-control" placeholder="Re-type password" required>
          <div class="input-group-append input-group-text">
          <span toggle="#password-field-v" class="far fa-eye-slash toggle-password-v" title="Show/hide password"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#" title="Terms">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="<?=base_url('auth')?>" class="text-center">Already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

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

$(".toggle-password-v").click(function() {

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
