<!-- jQuery -->
<script src="{{ asset('techniciandashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('techniciandashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('techniciandashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('techniciandashboard/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('techniciandashboard/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('techniciandashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('techniciandashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('techniciandashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('techniciandashboard/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('techniciandashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('techniciandashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('techniciandashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('techniciandashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('techniciandashboard/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('techniciandashboard/dist/js/dark-mode-toggle.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('techniciandashboard/dist/js/demo.js') }}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('techniciandashboard/dist/js/pages/dashboard.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('admin/dist/js/jquery-3.6.0.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}">
</script>
<script src="{{ asset('admin/dist/js/jquery.dataTables.min.js') }}"></script>
<!-- End -->
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>

@include('sweetalert::alert')