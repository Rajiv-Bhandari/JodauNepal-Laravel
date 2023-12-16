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
                    <a href="
                    #
                    "
                        class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home m-1 p-1"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- Subscription --}}
                <li class="nav-item m-1">
                    <a href="
                   #
                    "
                        class="nav-link {{ request()->is('technician') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-funnel-dollar m-1 p-1"></i>
                        <p>
                            Technician
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

       
</div>
</aside>    