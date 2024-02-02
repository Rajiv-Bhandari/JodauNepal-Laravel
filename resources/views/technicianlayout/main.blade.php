<!DOCTYPE html>
<html lang="en">
@include('technicianlayout.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('images/profile_pictures/1706613532.jpg') }}" alt="Loading" height="160" width="160">
  </div>
  @include('technicianlayout.navbar')

  @include('technicianlayout.sidebar')

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="#">Jodau Nepal</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @include('technicianlayout.script')
</div>
<!-- ./wrapper -->


</body>
</html>
