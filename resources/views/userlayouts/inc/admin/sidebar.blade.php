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
            <li class="nav-item"> <a class="nav-link" href="#">Electrician</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Plumber</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('user.category')}}">Home Tution</a></li>
          </ul>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-shopping menu-icon"></i>
          <span class="menu-title">Booking</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-history menu-icon"></i>
          <span class="menu-title">History</span>
        </a>
      </li>
   
    </ul>
  </nav>