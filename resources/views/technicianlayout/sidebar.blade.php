  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/profile_pictures/1706613532.jpg') }}" class="img-circle elevation-2" alt="Logo">
        </div>
        <div class="info">
          <a href="#" class="d-block">Jodau Nepal</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('technician.dashboard')}}" class="nav-link  {{ Route::is('technician.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('timeslot.technician')}}" class="nav-link   {{ Route::is('timeslot.*') ? 'active' : '' }}">
              <i class="nav-icon far fa-clock"></i>
              <p>
                Time Slot
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('technician.booking')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Booking
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/kanban.html" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                History
              </p>
            </a>
          </li>

        </ul>
        <!-- Logout Button -->
        <div class="text-center mt-auto p-3">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger" style="width:200px;">Logout</button>
          </form>
        </div>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>