<aside class="main-sidebar sidebar-dark-primary elevation-4">
<div class="sidebar p-1">
    {{-- sidebar user panel --}}
    
    <div class="user-panel mt-4 pb-4 mb-4 px-1 d-flex">
        <img src="{{ asset('images/background.jpg') }}" class="elevation-2" alt="jodau np">
        <div class="info mb-2">
            <a href="
            " class="d-block" style="margin-left: -10px;"> Jodau-np
                <br>
            <small class="ml-4">Jodau Nepal</small>
            </a>
        </div>
    </div>

    {{-- sidebar menu  --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{-- dashboard --}}
                <li class="nav-item m-1">
                    <a href="{{route('admin.home')}}"
                        class="nav-link {{ request()->is('admin-dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home m-1 p-1"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                
                <li class="nav-item m-1">
                    <a href="{{route('admin.dashboard')}}"
                        class="nav-link {{ request()->is('admin-technicians') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-child m-1 p-1"></i>
                        <p>
                            Technician Request
                        </p>
                    </a>
                </li>

                <li class="nav-item m-1">
                    <a href="{{route('category.index')}}"
                        class="nav-link {{ Route::is('category.*') ? 'active' : '' }}">
                        <i class="nav-icon fab fa-fort-awesome m-1 p-1"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>

                <li class="nav-item m-1">
                    <a href="{{route('user.index')}}"
                        class="nav-link {{ request()->is('admin-user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-alt m-1 p-1"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>

                <li class="nav-item m-1">
                    <a href="{{route('report.booking')}}"
                        class="nav-link {{ Route::is('report.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt m-1 p-1"></i>
                        <p>
                            Reports
                        </p>
                    </a>
                </li>

                <li class="nav-item m-1">
                    <a href="{{route('payment.admin')}}"
                        class="nav-link {{ Route::is('payment.admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-bill-alt m-1 p-1"></i>
                        <p>
                            Payments
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

       
</div>
</aside>    