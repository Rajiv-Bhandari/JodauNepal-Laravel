<!DOCTYPE html>

<html lang="en">
    @include('include.head')

        <body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">
            <div class="wrapper">
                {{-- navigation bar  --}}
                @include('include.navbar')

                {{-- main sidebar container --}}
                @include('include.sidebar')

                {{-- main contents --}}
                <div class="content-wrapper">
                    @yield('content')
                </div>

                <footer class="main-footer">
                    <strong>Copyright &copy;<a href="#">Jodau Nepal</a></strong>
                    <div class="float-right d-none d-sm-inline-block">
                        {{-- <b>Version</b> 1.0 --}}
                    </div>
                </footer>

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>

                {{-- page js --}}
                @include('include.script')

            </div>
        </body>

</html>