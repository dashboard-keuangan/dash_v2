  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="https://github.com/dashboard-keuangan/dash-keu" target="_blank">Team KP</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      Telkom University
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url();?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>assets/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?=base_url();?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Logout -->
<script type="text/javascript">
  $(function() {
      $('.logout').click(function() {
        Swal.fire({
          title: 'Logout?',
          text: "Sesi anda akan dihapus!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, logout!'
        }).then((result) => {
          if (result.value) {
            window.location = "<?=base_url('auth/logout')?>";
          }
        });
      });

  });

  function goBack() {
    window.history.back();
  }
</script>