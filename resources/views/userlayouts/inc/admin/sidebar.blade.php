<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link"  href="{{url('user-home')}}" >
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-view-list menu-icon"></i>
            <span class="menu-title">Category</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="category">
            <ul class="nav flex-column sub-menu">
                @php
                    $categories = \App\Models\Category::all();
                @endphp
                @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.category', ['category' => $category->id]) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </li>
      
    <li class="nav-item {{ request()->is('user.booking.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.booking') }}">
            <i class="mdi mdi-shopping menu-icon"></i>
            <span class="menu-title">Booking</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('user.payment.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.payment') }}">
            <i class="mdi mdi-credit-card menu-icon"></i>
            <span class="menu-title">Payments</span>
        </a>
    </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('profile.user')}}">
          <i class="mdi mdi-account-circle menu-icon"></i>
          <span class="menu-title">Profile</span>
        </a>
      </li>
    </ul>
  </nav>