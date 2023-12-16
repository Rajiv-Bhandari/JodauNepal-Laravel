<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    {{-- left side nav bar links --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="javascript:void()" class="nav-link">Welcome @if (Auth::check())
                    {{ Auth::user()->name }}
                @endif</a>
        </li>
    </ul>

    {{-- RIGHT SIDE NAV LINKS --}}
    <div class="ml-auto"> <!-- Use ml-auto to push content to the right -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item dropdown" >
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-cog"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-lock mr-2"></i> Change Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type='submit' class="dropdown-item">
                            <i class="fas fa-power-off mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
