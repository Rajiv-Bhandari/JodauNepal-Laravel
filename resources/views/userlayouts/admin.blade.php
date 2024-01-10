<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Amity Store || Admin </title>

       <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('user/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('user/vendors/base/vendor.bundle.base.css')}}">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="{{asset('user/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{asset('user/images/amity1.png')}}" />
        @livewireStyles
    </head>
    <body>

        <div class="container-scroller">
            @include('userlayouts.inc.admin.navbar')
            
            <div class="container-fluid page-body-wrapper" style="margin-top:-15px;">
                
                @include('userlayouts.inc.admin.sidebar')

                <div class="main-panel" style="margin-top:-15px;">
                    <div class="content-wrapper">
                         @yield('content')
                    </div> 
                </div>      
            </div>   
        </div>    
         <!-- plugins:js -->
    <script src="{{asset('user/vendors/base/vendor.bundle.base.js')}}"></script>

    <script src="{{asset('user/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('user/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>


     <!-- inject:js -->
    <script src="{{asset('user/js/off-canvas.js')}}"></script>
    <script src="{{asset('user/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('user/js/template.js')}}"></script>

      <!-- Custom js for this page-->
    <script src="{{asset('user/js/dashboard.js')}}"></script>
    <script src="{{asset('user/js/data-table.js')}}"></script>
    <script src="{{asset('user/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('user/js/dataTables.bootstrap4.js')}}"></script>
    <!-- End custom js for this page-->
    @include('sweetalert::alert')
    @livewireScripts
    </body>
</html>    
